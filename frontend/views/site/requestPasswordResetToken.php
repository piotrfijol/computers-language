<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\PasswordResetRequestForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Resetuj hasło';
?>
<div class="site-request-password-reset">

    <div class="d-flex align-items-center h-75 row pt-5">
        <div class="col-xs-12 col-sm-8 col-lg-5 m-auto form-container">
            <h1 class="text-center form-title mb-3" ><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary col-12 my-2 mt-4']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
