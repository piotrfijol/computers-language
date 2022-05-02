<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>

<div class="site-login">

    <div class="d-flex justify-content-center align-items-center h-75 row pt-5 py-5">
        <div class="col-xs-12 col-sm-8 m-auto form-container">
            <h1 class="text-center form-title" >Panel kontrolny</h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['style' => 'padding-top: 25px;']]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Login'])->label('') ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Hasło'])->label('') ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label("Zapamiętaj mnie!") ?>

            
            <div class="form-group text-center">
                <?= Html::submitButton('Zaloguj', ['class' => 'btn btn-primary btn-block px-5 py-2', 'name' => 'login-button']) ?>
            </div>

            <div style="color:#999;margin:1em 0">
                <?= Html::a('Nie pamiętam hasła', ['site/request-password-reset'], ['style' => 'display: block; text-align: center']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>