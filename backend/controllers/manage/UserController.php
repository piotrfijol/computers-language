<?php

namespace backend\controllers\manage;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserController extends Controller {

    public function beforeAction($actionName) {

        if(Yii::$app->user->identity->isAdmin)
            return parent::beforeAction($actionName);
        else
            return $this->redirect('/manage/chapter/view');
    }
    
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
                    'update' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $this->redirect("/manage/test/view");
    }
    public function actionView() {
        
        $model = \common\models\User::find();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider]);
    }

    
    public function actionDelete($id) {
        
        $user = \common\models\User::find()->where(['id' => $id])->one();

        if(is_null($user))
            return;

        return $user->delete() && $this->redirect('/manage/user/view'); 
    }
    
    public function actionUpdate($id) {
        $user = \common\models\User::find()->where(['id' => $id])->one();
        $model = new \backend\models\user\CreateForm();

        $model->status = $user->status;
        $model->email = $user->email;

        if($model->load(Yii::$app->request->post())) {
            $model->id = $user->id;

            if($model->create())
                return $this->redirect('/manage/user/view');
        }

        $statusList = [
            9 => 'Niezweryfikowany',
            10 => 'Aktywny'
        ];

        return $this->render('update', ['model' => $model, 'statusList' => $statusList]);
    }

}