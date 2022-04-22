<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Course extends ActiveRecord {

    public static function tableName() {
        return '{{%course}}';
    }

    public function rules() {
        return [
            [['name', 'img_url', 'slug'], 'unique', 'message' => 'Podana wartość już istnieje.'],

            ['name', 'trim'],
            ['name', 'message' => 'Kurs o tej nazwie już istnieje.'],
            ['name', 'string', 'min' => 2,'max' => 128, 'tooBig' => 'Nazwa kursu może składać się z maksymalnie 128 znaków.'],

            ['img_url', 'string', 'max' => 255, 'tooBig' => 'Adres URL nie może przekraczać 255 znaków.'],
            
            ['slug', 'string']
        ];
    } 
}