<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;


$this->title = "Rozdziały - Edytuj";

?>

<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['class' => 'text-white']]) ?>



<?= $form->field($model, 'name')->textInput(['value' => $model->name])->label('Tytuł') ?>

<?= $form->field($model, 'img_url')->textInput(['value' => $model->img_url])->label('URL obrazka:') ?>

<?= $form->field($model, 'category_id')->dropDownList($categoryList, ['prompt' => 'Wybierz kategorię', 'value' => $model->category_id])->label("Kategoria") ?>

<?= Html::button("Edytuj", ['class' => 'btn btn-primary w-100 py-2 my-5', 'type' => 'submit']) ?>

<?php ActiveForm::end() ?>