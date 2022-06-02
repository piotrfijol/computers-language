<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Kursy - Utwórz";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'name')->textInput()->label('Tytuł') ?>

<?= $form->field($model, 'img_url')->textInput()->label('URL obrazka:') ?>

<?= $form->field($model, 'category_id')->dropDownList($categoryList, ['prompt' => 'Wybierz kategorię'])->label("Kategoria") ?>

<?= Html::button("Utwórz", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>