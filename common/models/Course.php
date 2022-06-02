<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Chapter;

class Course extends ActiveRecord {

    public static function tableName() {
        return '{{%course}}';
    }

    public function rules() {
        return [
            [['name', 'slug'], 'unique', 'message' => 'Podana wartość już istnieje.'],

            ['name', 'trim'],
            ['name', 'string', 'min' => 2,'max' => 128, 'tooLong' => 'Nazwa kursu może składać się z maksymalnie 128 znaków.'],

            ['img_url', 'string', 'max' => 255, 'tooLong' => 'Adres URL nie może przekraczać 255 znaków.'],
            
            ['slug', 'required'],
            ['slug', 'string'],
        ];
    } 

    public function getChapters() {
        return $this->hasMany(Chapter::class, ['course_id' => 'id']);
    }
}