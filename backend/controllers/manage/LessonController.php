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
                    'create' => ['post', 'get'],
                    'update' => ['post', 'get'],
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

    
    public function actionCreate() {
        $model = new \backend\models\lesson\CreateForm();
        $chapters = \common\models\Chapter::find()->all();

        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect('/manage/lesson/view');
        }
        $chaptersList = [];

        foreach($chapters as $chapter) {
            $chaptersList[$chapter['id']] = $chapter['id'] . ' - ' . $chapter['name'];
        }
        return $this->render('create', ['model' => $model, 'chapterList' => $chaptersList]);
    }

    public function actionDelete($id) {
        
        $lesson = \common\models\Lesson::find()->where(['id' => $id])->one();

        if(is_null($lesson))
            return;

        return $lesson->delete() && $this->redirect('/manage/lesson/view'); 
    }
    
    public function actionUpdate($id) {
        $lesson = \common\models\Lesson::find()->where(['id' => $id])->one();
        $model = new \backend\models\lesson\CreateForm();

        $model->title = $lesson->title;
        $model->content = $lesson->content;
        $model->chapter_id = $lesson->chapter_id;

        if($model->load(Yii::$app->request->post())) {
            $model->id = $lesson->id;

            if($model->create())
                return $this->redirect('/manage/lesson/view');
        }

        $chapters = \common\models\Chapter::find()->all();
        $chaptersList = [];

        foreach($chapters as $chapter) {
            $chaptersList[$chapter['id']] = $chapter['id'] . ' - ' . $chapter['name'];
        }
        return $this->render('update', ['model' => $model, 'chapterList' => $chaptersList]);
    }

}