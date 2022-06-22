<?php

namespace backend\models\user;

use Yii;
use yii\base\Model;

class CreateForm extends Model {
    
    public $id;

    public $email;
    public $status;
    

    public function rules() {
        return [
            ['email', 'trim'],
            ['email', 'required'],

            ['status', 'integer', 'min' => 9, 'max' => 10]
        ];
    }

    public function create() {
        if(!$this->validate()) {
            return;
        }

        if(!isset($this->id))
            $user = new \common\models\User();
        else
            $user = \common\models\User::find()->where(['id' => $this->id])->one();

        $user->status = $this->status;
        $user->email = $this->email;

        return $user->save();
    }
}