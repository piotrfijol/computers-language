<?php

namespace backend\models\chapter;

use yii;
use yii\base\Model;

class CreateForm extends Model {

    public $name;
    public $description;
    public $course_id;
    public $slug;

    public function rules() {
        return [
            [['name', 'description'], 'trim'],

            ['name', 'required'],
            ['name', 'string', 'max' => 128, 'message' => 'Nazwa kursu może składać się z maksymalnie 128 znaków.'],

            ['description', 'string', 'max' => 255, 'message' => 'Opis nie może być dłuższy niż 255 znaków.'],

            ['course_id', 'integer'],
            ['course_id', 'required'],            
            ['course_id', 'exist', 'targetClass' => \common\models\Course::class, 'targetAttribute' => 'id'],

        ];
    }

    public function create() {
        if(!$this->validate()) {
            return;
        }

        $chapter = new \common\models\Chapter();

        $chapter->name = $this->name;
        $chapter->description = $this->description;
        $chapter->course_id = $this->course_id;
        $chapter->slug = \backend\helpers\Utilities::slugify($this->name);

        return $chapter->save();
    }
    
}