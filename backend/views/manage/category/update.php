<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Kategorie - Edytuj";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>

<?= $form->field($model, 'name')->textInput(['value' => $model->name])->label('Tytuł') ?>

<?= Html::button("Utwórz", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>