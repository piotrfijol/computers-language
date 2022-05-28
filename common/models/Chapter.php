<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Lesson;

class Chapter extends ActiveRecord {


    public static function tableName() {
        return '{{%chapter}}';
    }

    public function rules() {
        return [
            [['name', 'slug'], 'unique', 'message' => 'Podana wartość już istnieje.'],
            [['name', 'description'], 'trim'],

            ['name', 'string', 'max' => 128, 'message' => 'Nazwa kursu może składać się z maksymalnie 128 znaków.'],

            ['description', 'string', 'max' => 255, 'message' => 'Opis nie może być dłuższy niż 255 znaków.'],

            ['slug', 'string'],

            ['course_id', 'integer'],
            ['course_id', 'required'],
            ['course_id', 'exist', 'targetClass' => \common\models\Course::class, 'targetAttribute' => 'id'],

            ['next_chapter', 'integer']
        ];
    }

    public function getLessons() {
        return $this->hasMany(Lesson::class, ['chapter_id' => 'id']);
    }

    public function getProgress() {
        $lessons = count($this->lessons);
        $finished_lessons = count(Yii::$app->user->identity->getFinishedLessons()->where(['chapter_id' => $this->id])->all());

        if($lessons != 0)
            return (int)(($finished_lessons/$lessons) * 100);
        
        return 0;
    }

    /**
     * Checks if chapter has been unlocked
     * @return bool
     */
    public function getIsLocked() {

        $previous_chapter = $this->getPreviousChapter();

        if(!isset($previous_chapter)) 
            return false; 

        $finished_chapters = Yii::$app->user->identity->getFinishedChapters();
        $chapter= $finished_chapters->where(['id' => $previous_chapter['id']])->one();

        return !isset($chapter);
    }

    public function hasPreviousChapter() {
        $previous_chapter = $this->getPreviousChapter();

        if(!isset($previous_chapter)) {
            return false;
        }

        return true;
    }

    public function getPreviousChapter() {
        return Chapter::find()->where(['next_chapter' => $this->id])->one();
    }

    public static function getLastChapter($course_id = null) {
        if($course_id == null) {
            return Chapter::find()->max('id');
        }
        
        return Chapter::find()->where(['course_id' => $course_id, 'next_chapter' => null])->one();
    }

    public function afterSave($insert, $changedAttributes) {

        if($insert) {
            if(Chapter::find()->where(['course_id' => $this->course_id])->count() > 1) {
                $last_chapter = Chapter::getLastChapter($this->course_id);
                $last_chapter->next_chapter = $this->id;
                $last_chapter->updateAttributes(['next_chapter']);
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete() {
        $count = Chapter::find()->where(['course_id' => $this->course_id])->count();
        if($count >= 1) {

            // If removed chapter was the last one
            if(is_null($this->next_chapter)) {
                // Set next_chapter property of the last remaining chapter to null
                $last_chapter = $this->getPreviousChapter();
                $last_chapter->next_chapter = null;
                $last_chapter->updateAttributes(['next_chapter']);
            } elseif ($this->hasPreviousChapter()) {
                // If the chapter wasnt last and it still had other chapters left
                $previous_chapter = $this->getPreviousChapter();
                $previous_chapter->next_chapter = $this->next_chapter;
                $previous_chapter->updateAttributes(['next_chapter']);

            }
        } 
        return parent::beforeDelete();
    }

}