<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class FinishedLesson extends ActiveRecord {

    public static function tableName() {
        return '{{%finished_lesson}}';
    }

    public function rules() {
        return [
            [['lesson_id', 'user_id'], 'integer'],
        ];
    }
}