<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class ProfileController extends Controller {

    public function beforeAction($action) {
        $this->layout = 'application';

        return parent::beforeAction($action);
    }
    public function actionIndex($profile_name = '') {
    if(!strcmp($profile_name, ''))
        return $this->render('index');
    
    }

}