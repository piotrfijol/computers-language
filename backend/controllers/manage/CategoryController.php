<?php

namespace backend\controllers\manage;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CategoryController extends Controller {

    
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
        $this->redirect("/manage/category/view");
    }
    public function actionView() {
        
        $model = \common\models\Category::find();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider]);
    }

    
    public function actionCreate() {
        $model = new \backend\models\category\CreateForm();

        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect('/manage/category/view');
        }
        
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id) {
        
        $category = \common\models\Category::find()->where(['id' => $id])->one();

        if(is_null($category))
            return;

        return $category->delete() && $this->redirect('/manage/category/view'); 
    }
    
    public function actionUpdate($id) {
        $category = \common\models\Category::find()->where(['id' => $id])->one();
        $model = new \backend\models\category\CreateForm();

        $model->name = $category->name;

        if($model->load(Yii::$app->request->post())) {
            $model->id = $category->id;

            if($model->create())
                return $this->redirect('/manage/category/view');
        }

        return $this->render('update', ['model' => $model]);
    }

}