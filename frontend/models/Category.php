<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord {

    public static function tableName() {
        return '{{%category}}';
    }

    public function rules() {
        return [
            ['name', 'trim'],
            ['name', 'unique', 'message' => 'Kategoria o tej nazwie już istnieje.'],
            ['name', 'string', 'min' => 2,'max' => 128, 'tooBig' => 'Nazwa kategorii może składać się z maksymalnie 128 znaków.']
        ];
    }

}