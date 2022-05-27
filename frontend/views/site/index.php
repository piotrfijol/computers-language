<?php

use yii\bootstrap5\Html;
/** @var yii\web\View $this */

$this->title = 'Język Komputerów';
?>


<div class="row m-auto row-to-revcol main-container">
    <div class="info mb-5 col-xs-12 col-md-6 col-lg-6 d-flex align-items-center ">
        <div class="info">
            <span class="text-white font-weight-bold">Witaj!</span>
            <p class="text-white">
            Poznaj komputery. Dowiedz się jak 
            przyspieszyć swoje codzienne
            zadania i być bardziej efektywnym 
            z pomocą twojego komputera!
            Brzmi interesująco?
            </p>
            <?= Html::a('<button class="btn btn-important text-white px-4">Zacznij teraz</button>', ['login'])?>
        </div>
    </div>
    <div class="text-center m-auto col-xs-4 col-md-6 col-lg-6 coder-img-container">
        <?= Html::img(Yii::$app->request->baseUrl . 'img/coder.png', 
        ['alt' => 'A picture of person coding', 
        'class' => 'img-fluid coder-img',
	'style' => 'max-width: 80%'
        ]); ?>
    </div>
</div>