<?php

namespace backend\controllers\manage;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ChapterController extends Controller {

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
                    'create' => ['post', 'get'],
                    'update' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $this->redirect("/manage/chapter/view");
    }
    public function actionView() {

        $model = \common\models\Chapter::find();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider]);
    }

    public function actionCreate() {
        $model = new \backend\models\chapter\CreateForm();
        $courses = \common\models\Course::find()->all();

        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect('/manage/chapter/view');
        }
        $coursesList = [];

        foreach($courses as $course) {
            $coursesList[$course['id']] = $course['id'] . ' - ' . $course['name'];
        }
        return $this->render('create', ['model' => $model, 'courseList' => $coursesList]);
    }

    public function actionDelete($id) {
        
        $chapter = \common\models\Chapter::find()->where(['id' => $id])->one();

        if(is_null($chapter))
            return;

        return $chapter->delete() && $this->redirect('/manage/chapter/view'); 
    }
    
    public function actionUpdate($id) {
        $chapter = \common\models\Chapter::find()->where(['id' => $id])->one();
        $model = new \backend\models\chapter\CreateForm();

        $model->name = $chapter->name;
        $model->description = $chapter->description;
        $model->course_id = $chapter->course_id;

        if($model->load(Yii::$app->request->post())) {
            $model->id = $chapter->id;

            if($model->create())
                return $this->redirect('/manage/chapter/view');
        }

        $courses = \common\models\Course::find()->all();
        $coursesList = [];

        foreach($courses as $course) {
            $coursesList[$course['id']] = $course['id'] . ' - ' . $course['name'];
        }
        return $this->render('update', ['model' => $model, 'courseList' => $coursesList]);
    }
}