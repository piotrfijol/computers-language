<?php

namespace backend\controllers\manage;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class LessonController extends Controller {

    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                    'update' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $this->redirect("/manage/lesson/view");
    }
    public function actionView() {
        
        $model = \common\models\Lesson::find();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider]);
    }

}