<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Profile;
use yii\web\NotFoundHttpException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use yii\web\ForbiddenHttpException;

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

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($profile_name = '') {
        
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
            throw new NotFoundHttpException("Profil nie istnieje");
        } else {
            if($profile->is_private == true && strcmp(Yii::$app->user->identity->username, $profile->username)) {
                throw new ForbiddenHttpException("Profil jest prywatny");
            }
        }

        return $this->render('index', ['profile' => $profile]);

    }

}