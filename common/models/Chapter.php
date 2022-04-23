<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Chapter extends ActiveRecord {

    private $_progress;

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

    public function getProgress() {
        return;
    }
}