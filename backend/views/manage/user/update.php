<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Rozdziały - Edytuj";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'email')->textInput(['value' => $model->email])->label('Adres Email') ?>

<?= $form->field($model, 'status')->dropDownList($statusList, ['prompt' => 'Wybierz status', 'value' => $model->status])->label("Status") ?>

<?= Html::button("Edytuj", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>