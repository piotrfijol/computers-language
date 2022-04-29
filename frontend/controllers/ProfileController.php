<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Profile;

class ProfileController extends Controller {

    public function beforeAction($action) {

        /* Authorize client */
        if(Yii::$app->user->isGuest) {
            $this->redirect('/');
            return false;
        }
        
        $this->layout = 'application';

        return parent::beforeAction($action);
    }
    public function actionIndex($profile_name = '') {
        $error_message = "";
        
        if(!str_ends_with(Yii::$app->request->url, '/') && !strcmp($profile_name, '')) {
            $this->redirect(Yii::$app->request->url . '/');
            return false;
        }

        if(!strcmp($profile_name, '')) {
            $username = Yii::$app->user->identity->username;
            return $this->redirect(Yii::$app->request->url . $username);
        }
        else
            $profile = Profile::findByUsername($profile_name);

        

        if($profile == null) {
            $error_message = "Podany profil nie istnieje.";
        } else {
            if($profile->is_private == true && strcmp(Yii::$app->user->identity->username, $profile->username)) {
                $error_message = "Profil jest prywatny.";
            }
        }


        if(strcmp($error_message, "")) {
            return $this->render('error', ['errorMessage' => $error_message]);
        }

        return $this->render('index', ['profile' => $profile]);

    }

}