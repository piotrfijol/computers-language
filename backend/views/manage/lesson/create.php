<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Lekcje - Utwórz";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'title')->textInput()->label('Tytuł') ?>

<?= $form->field($model, 'content')->textarea(['style' => 'min-height: 250px; resize: none'])->label('Treść lekcji') ?>

<?= $form->field($model, 'chapter_id')->dropDownList($chapterList, ['prompt' => 'Wybierz rozdział'])->label("Rozdział") ?>

<?= Html::button("Utwórz", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>