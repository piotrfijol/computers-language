<?php

namespace backend\controllers\manage;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class QuestionController extends Controller {

    
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
        $this->redirect("/manage/question/view");
    }
    public function actionView() {
        
        $model = \common\models\Question::find();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider]);
    }

    public function actionCreate() {
        $model = new \backend\models\question\CreateForm();
        $tests = \common\models\Test::find()->all();

        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect('/manage/lesson/view');
        }
        $testsList = [];

        foreach($tests as $test) {
            $testsList[$test['id']] = $test['id'] . ' - ' . \common\models\Chapter::find()->where(['id' => $test['chapter_id']])->one()->name;
        }
        return $this->render('create', ['model' => $model, 'testList' => $testsList]);
    }
    

    public function actionDelete($id) {
        
        $question = \common\models\Question::find()->where(['id' => $id])->one();

        if(is_null($question))
            return;

        return $question->delete() && $this->redirect('/manage/question/view'); 
    }
    
    public function actionUpdate($id) {
        $question = \common\models\Question::find()->where(['id' => $id])->one();
        $model = new \backend\models\question\CreateForm();

        $model->question = $question->question;
        $model->answer_a = $question->answer_a;
        $model->answer_b = $question->answer_b;
        $model->answer_c = $question->answer_c;
        $model->answer_d = $question->answer_d;
        $model->correct_answer = $question->correct_answer;
        $model->test_id = $question->test_id;

        if($model->load(Yii::$app->request->post())) {
            $model->id = $question->id;

            if($model->create())
                return $this->redirect('/manage/question/view');
        }

        $tests = \common\models\Test::find()->all();
        $testsList = [];

        foreach($tests as $test) {
            $testsList[$test['id']] = $test['id'] . ' - ' . \common\models\Chapter::find()->where(['id' => $test['chapter_id']])->one()->name;
        }

        return $this->render('update', ['model' => $model, 'testList' => $testsList]);
    }

}