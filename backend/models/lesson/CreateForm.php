<?php

namespace backend\models\lesson;

use Yii;
use yii\base\Model;

class CreateForm extends Model {
    
    public $id;
    public $title;
    public $content;
    public $chapter_id;
    public $slug;
    

    public function rules() {
        return [
            [['title', 'content'], 'trim'],

            ['title', 'required'],
            ['title', 'string', 'max' => 128, 'message' => 'Nazwa lekcji może składać się z maksymalnie 128 znaków.'],
            
            ['chapter_id', 'integer'],
            ['chapter_id', 'required'],            
            ['chapter_id', 'exist', 'targetClass' => \common\models\Chapter::class, 'targetAttribute' => 'id'],

        ];
    }

    public function create() {
        if(!$this->validate()) {
            return;
        }

        if(!isset($this->id))
            $lesson = new \common\models\Lesson();
        else
            $lesson = \common\models\Lesson::find()->where(['id' => $this->id])->one();

        $lesson->title = $this->title;
        $lesson->content = $this->content;
        $lesson->chapter_id = $this->chapter_id;
        $lesson->slug = \backend\helpers\Utilities::slugify($this->title);

        return $lesson->save();
    }
}