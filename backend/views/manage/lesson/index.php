<?php

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\grid\GridView;
use yii\bootstrap5\Html;

$this->title = "Lekcje";
?>

<div class="text-end">
    <?php 
        $button = Html::button('<i class="fa-solid fa-plus"></i> Dodaj', ['class' => 'btn btn-primary px-5 py-2', 'style' => 'min-width: 200px;']);

        echo Html::a($button, str_replace('//', '/', dirname(Yii::$app->request->url) . "/create"));
    ?>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            'label' => 'ID'
        ],
        [
            'attribute' => 'title',
            'label' => 'Tytuł'
        ],
        [
            'attribute' => 'slug',
            'label' => 'Slug'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttonOptions' => ['style' => 'margin-left: 10px;']
        ]

    ],
    'tableOptions' => ['class' =>'table data-table text-white text-center'],
    'headerRowOptions' => [
        'class' => 'text-center'
    ],
    'layout' => "\u{200B}{items}\n{pager}",
    
	'pager' => [
		'options' => [
			'tag' => 'ul',
			'class' => 'pagination justify-content-center',
			'id' => 'pager-container',
		],
		'firstPageLabel' => '<<',
		'lastPageLabel' => '>>',
		'prevPageLabel' => '<',
		'nextPageLabel' => '>',
		'activePageCssClass' => 'page-active',
		'maxButtonCount' => 3,
		'linkOptions' => ['class' => 'page-link'],
		'disabledPageCssClass' => 'disabled p-1 px-2',

		// Customzing CSS class for navigating link
		'pageCssClass' => ['class' => 'page-item'],
		'prevPageCssClass' => 'page-back',
		'nextPageCssClass' => 'page-next',
		'firstPageCssClass' => 'page-first',
		'lastPageCssClass' => 'page-last',
		],
]) ?>
