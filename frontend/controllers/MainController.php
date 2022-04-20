<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class MainController extends Controller {

    public function actionIndex() {
        $this->layout = "application";
        return $this->render('index');
    }

}