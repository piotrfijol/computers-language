<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Rozdziały - Utwórz";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'name')->textInput()->label('Tytuł') ?>

<?= $form->field($model, 'description')->textarea()->label('Opis') ?>

<?= $form->field($model, 'course_id')->dropDownList($courseList, ['prompt' => 'Wybierz kurs'])->label("Kurs") ?>

<?= Html::button("Utwórz", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>