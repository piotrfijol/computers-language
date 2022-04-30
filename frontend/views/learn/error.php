<?php

/** @var yii\web\View $this */
/** @var string $message */
/** @var string $name */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;

?>
<div class="box">
    <div class="box__content">
        <div class="error">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>

            <p>
                Powyższy błąd wystąpił w trakcie przetwarzania twojego zapytania przez serwer.
            </p>
            <p>
                Prosimy o kontakt z administratorem jeżeli uważasz, że problem wystapił po stronie serwera. Dziękujemy.
            </p>
        </div>
    </div>
</div>