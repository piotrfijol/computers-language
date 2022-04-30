<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\GeneralSettingsForm;

class SettingsController extends Controller {


    public function beforeAction($action) {
         /* Authorize client */
         if(Yii::$app->user->isGuest) {
            $this->redirect('/');
            return false;
        }
        
        $this->layout = 'application';

        return parent::beforeAction($action);
    }

    public function actionIndex() {
        if(!str_ends_with(Yii::$app->request->url, '/')) {
            $this->redirect(Yii::$app->request->url . '/');
            return false;
        }

        $model = new GeneralSettingsForm(); 
        $model->getData();
    
        if($model->load(Yii::$app->request->post()) &&  $model->updateInfo()){
            return $this->redirect("/opcje/");
        }

        return $this->render('general', [
            'model' => $model
        ]);
    }

}