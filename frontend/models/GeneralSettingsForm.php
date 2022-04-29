<?php

namespace frontend\models;

use yii;
use yii\base\Model;
use common\models\Profile;

class GeneralSettingsForm extends Model {

    public $first_name;
    public $last_name;
    public $city;
    public $description;

    public function updateInfo() {


        //return true;
        $profile = Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one();

        echo $this->city;

        $profile->first_name = $this->first_name;
        $profile->last_name = $this->last_name;
        $profile->city = $this->city;
        $profile->description = $this->description;

        echo var_dump($profile->isNewRecord);
        return $profile->save() ? $profile : null;
    }

    public function getData() {
        $profile = Yii::$app->user->identity->profile;

        $this->first_name = $profile->first_name;
        $this->last_name = $profile->last_name;
        $this->city = $profile->city;
        $this->description = $profile->description;

    }
}