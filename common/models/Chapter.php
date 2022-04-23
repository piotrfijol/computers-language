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

            ['name', 'string', 'min' => 2,'max' => 128, 'tooBig' => 'Nazwa kursu może składać się z maksymalnie 128 znaków.'],

            ['description', 'string', 'max' => 255, 'tooBig' => 'Opis nie może być dłuższy niż 255 znaków.'],

            ['slug', 'string']
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

}