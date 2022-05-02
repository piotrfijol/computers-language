<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="d-flex align-items-center h-75 row pt-5">
        <div class="col-xs-12 col-sm- 8 col-lg-5 m-auto form-container">
            <h1 class="text-center form-title" ><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['style' => 'padding-top: 25px;']]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Login'])->label('') ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Hasło'])->label('') ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label("Zapamiętaj mnie!") ?>

            
            <div class="form-group">
                <?= Html::submitButton('Zaloguj', ['class' => 'btn btn-primary col-12', 'name' => 'login-button']) ?>
            </div>

            <div style="color:#999;margin:1em 0">
                <?= Html::a('Nie pamiętam hasła', ['site/request-password-reset'], ['style' => 'display: block; text-align: center']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
