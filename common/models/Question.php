<?php 

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Question extends ActiveRecord {

    public static function tableName() {
        return '{{%question}}';
    }

    public function rules() {
        return [];
    }

}