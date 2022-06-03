<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Pytania - Edytuj";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'question')->textInput()->label('Pytanie') ?>

<?= $form->field($model, 'answer_a')->textInput()->label('Odpowiedź A') ?>

<?= $form->field($model, 'answer_b')->textInput()->label('Odpowiedź B') ?>

<?= $form->field($model, 'answer_c')->textInput()->label('Odpowiedź C') ?>

<?= $form->field($model, 'answer_d')->textInput()->label('Odpowiedź D') ?>

<?= $form->field($model, 'correct_answer')->textInput(['placeholder' => 'np. b'])->label('Poprawna odpowiedź') ?>

<?= $form->field($model, 'test_id')->dropDownList($testList, ['prompt' => 'Wybierz test'])->label("Test") ?>

<?= Html::button("Edytuj", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>