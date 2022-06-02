<?php

namespace backend\controllers\manage;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CourseController extends Controller {

    
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
        $this->redirect("/manage/course/view");
    }
    public function actionView() {
        
        $model = \common\models\Course::find();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider]);
    }

    
    public function actionCreate() {
        $model = new \backend\models\course\CreateForm();
        $categories = \common\models\Category::find()->all();

        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect('/manage/course/view');
        }
        $categoriesList = [];

        foreach($categories as $category) {
            $categoriesList[$category['id']] = $category['id'] . ' - ' . $category['name'];
        }
        return $this->render('create', ['model' => $model, 'categoryList' => $categoriesList]);
    }

    public function actionDelete($id) {
        
        $course = \common\models\Course::find()->where(['id' => $id])->one();

        if(is_null($course))
            return;

        return $course->delete() && $this->redirect('/manage/course/view'); 
    }
    
    public function actionUpdate($id) {
        $course = \common\models\Course::find()->where(['id' => $id])->one();
        $model = new \backend\models\course\CreateForm();

        $model->name = $course->name;
        $model->img_url = $course->img_url;
        $model->category_id = $course->category_id;

        if($model->load(Yii::$app->request->post())) {
            $model->id = $course->id;

            if($model->create())
                return $this->redirect('/manage/course/view');
        }

        $categories = \common\models\Category::find()->all();
        $categoriesList = [];

        foreach($categories as $category) {
            $categoriesList[$category['id']] = $category['id'] . ' - ' . $category['name'];
        }
        return $this->render('update', ['model' => $model, 'categoryList' => $categoriesList]);
    }
}