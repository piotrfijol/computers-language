<?php

namespace backend\models\question;

use Yii;
use yii\base\Model;

class CreateForm extends Model {
    
    public $id;
    public $question;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer;
    public $test_id;
    

    public function rules() {
        return [
            [['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'correct_answer'], 'trim'],
            [['question', 'answer_a', 'answer_b', 'answer_c', 'answer_d'], 'string', 'max' => 255, 'tooLong' => 'Pole nie może być dłuższe niż 255 znaków'],
            [['question', 'answer_a', 'answer_b', 'correct_answer'], 'required', 'message' => 'To pole jest wymagane'],
            ['correct_answer', 'string', 'max' => 1, 'message' => 'To pole musi składać się z jednego znaku'],
            
            ['test_id', 'integer'],
            ['test_id', 'required'],            
            ['test_id', 'exist', 'targetClass' => \common\models\Test::class, 'targetAttribute' => 'id'],
        ];
    }

    public function create() {
        if(!$this->validate()) {
            return;
        }

        if(!isset($this->id))
            $question = new \common\models\Question();
        else
            $question = \common\models\Question::find()->where(['id' => $this->id])->one();

        $question->question = $this->question;
        $question->answer_a = $this->answer_a;
        $question->answer_b = $this->answer_b;
        $question->answer_c = $this->answer_c;
        $question->answer_d = $this->answer_d;
        $question->test_id = $this->test_id;
        $question->correct_answer = $this->correct_answer;

        return $question->save();
    }
}