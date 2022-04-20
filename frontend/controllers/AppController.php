<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller {

    public function beforeAction($action) {
        
        if(Yii::$app->user->isGuest) {
            $this->redirect('/');
            return false;
        }
        $this->layout = "application";
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        return $this->redirect('/app/learn');
    }

    public function actionLearn() {

        
        return $this->render('index');
    }

}