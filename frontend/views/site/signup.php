<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Rejestruj';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row  pt-5">
        <div class="col-xs-12 col-sm- 8 col-lg-5 m-auto form-container">
            <h1 class="text-center form-title" ><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['style' => 'padding-top: 25px;']]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Login'])->label('') ?>

                <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Email'])->label('') ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Hasło'])->label('') ?>

                <div class="form-group">
                    <?= Html::submitButton('Zarejestruj', ['class' => 'btn btn-primary col-12 my-4  ', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
