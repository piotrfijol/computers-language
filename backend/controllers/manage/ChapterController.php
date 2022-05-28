<?php

namespace backend\controllers\manage;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class ChapterController extends Controller {

    public function actionIndex() {
        $this->redirect("/manage/chapter/view");
    }
    public function actionView() {
        

        $searchModel = new \common\models\Chapter();
        $model = \common\models\Chapter::find();

        $pagination = new \yii\data\Pagination(['totalCount' => $model->count()]);


        $provider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider, 'searchModel' => $searchModel, 'pagination' => $pagination]);
    }

    public function actionCreate() {
        $model = new \backend\models\chapter\CreateForm();
        $courses = \common\models\Course::find()->all();

        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect('/');
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
                return $this->redirect('/');
        }

        $courses = \common\models\Course::find()->all();
        $coursesList = [];

        foreach($courses as $course) {
            $coursesList[$course['id']] = $course['id'] . ' - ' . $course['name'];
        }
        return $this->render('update', ['model' => $model, 'courseList' => $coursesList]);
    }
}