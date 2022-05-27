<?php

namespace backend\controllers\manage;

use yii\web\Controller;
use yii\data\ActiveDataProvider;

class ChapterController extends Controller {

    public function actionIndex() {
        

        $searchModel = new \common\models\Chapter();
        $model = \common\models\Chapter::find();

        $provider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('index', ['dataProvider' => $provider, 'searchModel' => $searchModel]);
    }

    public function actionView($id) {
        return;
    }


}