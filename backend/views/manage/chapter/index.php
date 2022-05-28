<?php

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\grid\GridView;
use yii\bootstrap5\Html;

$this->title = "Rozdziały";
?>

<?php 
    $button = Html::button('Dodaj', ['class' => 'btn btn-primary px-5 py-2']);

    echo Html::a($button, str_replace('//', '/', Yii::$app->request->url . "/create"));
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'label' => 'Tytuł'
        ],
        [
            'attribute' => 'description',
            'label' => 'Opis'
        ],
        'slug',
        ['class' => 'yii\grid\ActionColumn']
    ],
    'tableOptions' => ['class' =>'table data-table text-white text-center'],
    'headerRowOptions' => [
        'class' => 'text-center'
    ]
]) ?>