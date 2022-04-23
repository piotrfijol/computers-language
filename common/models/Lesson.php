<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Lesson extends ActiveRecord {

    public static function tableName() {
        return '{{%lesson}}';
    }

    public function rules() {
        return [
            
        ];
    }
}