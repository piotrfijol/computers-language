<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Rozdziały - Edytuj";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'name')->textInput(['value' => $model->name])->label('Tytuł') ?>

<?= $form->field($model, 'description')->textarea(['style' => 'min-height: 250px; resize: none', 'value' => $model->description])->label('Opis') ?>

<?= $form->field($model, 'course_id')->dropDownList($courseList, ['prompt' => 'Wybierz kurs', 'value' => $model->course_id])->label("Kurs") ?>

<?= Html::button("Utwórz", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>