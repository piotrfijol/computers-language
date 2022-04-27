<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class FinishedChapter extends ActiveRecord {

    public static function tableName() {
        return '{{%finished_chapter}}';
    }

    public function rules() {
        return [
            [['chapter_id', 'user_id'], 'integer']
        ];
    }
}