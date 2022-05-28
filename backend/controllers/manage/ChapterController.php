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
                'pageSize' => 3,
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
        
        $chapter = \common\models\Chapter::findOne($id);

        if(is_null($chapter))
            return;

        $chapter->delete();

    }

}