<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Profile extends ActiveRecord {

    public static function tableName() {
        return '{{%profile}}';
    }

    public function rules() {
        return [
            
        ];
    }

    public static function findByUsername($username) {
        $user = User::findByUsername($username);
        if($user != null) 
            return $user->profile;
        
        return null;
    }

    public static function findById($id) {
        $user = User::findIdentity($id);
        if($user != null) 
            return $user->profile;
        
        return null;
    }

    public function getUsername() {
        return $this->hasOne(User::class, ['id' => 'user_id'])->one()->username;
    }

}