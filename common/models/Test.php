<?php 

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Question;

class Test extends ActiveRecord {

    public static function tableName() {
        return '{{%test}}';
    }

    public function rules() {
        return [];
    }

    public function getQuestions() {
        return $this->hasMany(Question::class, ['test_id' => 'id']);
    }

}