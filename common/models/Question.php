<?php 

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Question extends ActiveRecord {

    public static function tableName() {
        return '{{%question}}';
    }

    public function rules() {
        return [
            [['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d'], 'trim'],
            [['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d'], 'string', 'max' => 255, 'tooLong' => 'Pole nie może być dłuższe niż 255 znaków'],
            [['question', 'answer_a', 'answer_b'], 'required', 'message' => 'To pole jest wymagane'],
            
            ['test_id', 'integer'],
            ['test_id', 'required'],            
            ['test_id', 'exist', 'targetClass' => \common\models\Test::class, 'targetAttribute' => 'id'],
        ];
    }

}