<?php

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\grid\GridView;
use yii\bootstrap5\Html;

?>

<h1 class="text-white text-center my-5">Rozdziały</h1>

<?= Html::button('Dodaj', ['class' => 'btn btn-primary px-5 py-2']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        'description',
        'slug',
        ['class' => 'yii\grid\ActionColumn']
    ],
    'tableOptions' => ['class' =>'table data-table text-white text-center'],
    'headerRowOptions' => [
        'class' => 'text-center'
    ]
]) ?>