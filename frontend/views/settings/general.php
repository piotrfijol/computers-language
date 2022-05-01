<?php

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="webpage">
    <svg
    class="webpage__icon"
    viewBox="0 0 48 48"
    version="1.1"
    id="svg5224"
    inkscape:version="1.1 (c68e22c387, 2021-05-23)"
    sodipodi:docname="settings_icon.svg"
    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
    xmlns="http://www.w3.org/2000/svg"
    xmlns:svg="http://www.w3.org/2000/svg">
    <g
        inkscape:label="Warstwa 1"
        inkscape:groupmode="layer"
        id="layer1">
        <path
        id="path5307"
        style="fill:transparent; fill-opacity:1;fill-rule:evenodd;stroke:#e66c11;stroke-width:3.77953;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
        d="M 75.412109 9.9316406 C 73.137722 17.708638 71.237254 25.484722 69.6875 33.261719 A 63.411564 60.375908 0 0 0 62.248047 36.146484 C 56.25694 32.046513 50.115623 28.094894 43.826172 24.289062 L 22.945312 44.876953 C 26.620947 50.619019 30.34172 56.332557 34.150391 61.992188 A 63.411564 60.375908 0 0 0 29.435547 72.699219 C 22.615487 74.193141 15.798263 75.883202 8.9863281 77.763672 L 9.6035156 107.08203 C 16.528671 108.39864 23.464631 109.65776 30.423828 110.80859 A 63.411564 60.375908 0 0 0 33.890625 118.32617 C 29.771041 124.27232 25.796167 130.36729 21.966797 136.61133 L 42.429688 157.61523 C 49.117924 153.3899 55.769463 149.10433 62.341797 144.68945 A 63.411564 60.375908 0 0 0 70.125 147.67383 C 71.622146 155.66496 73.385848 163.65732 75.412109 171.64844 L 104.73633 171.64844 C 106.41325 163.73792 108.0181 155.81006 109.4668 147.84766 A 63.411564 60.375908 0 0 0 113.625 146.43164 C 120.76932 151.26041 128.36229 155.81179 136.48047 160.03711 L 157.36328 139.44922 C 153.66632 132.58077 149.71469 125.96295 145.53906 119.56641 A 63.411564 60.375908 0 0 0 150.00781 109.94531 C 157.02095 108.24078 164.10954 106.16982 171.2832 103.68359 L 170.66797 74.365234 C 163.63021 72.466645 156.59766 70.871283 149.57227 69.560547 A 63.411564 60.375908 0 0 0 147.00586 63.84375 C 150.96199 57.817679 154.72476 51.472812 158.26562 44.767578 L 137.80273 23.763672 C 130.69754 27.533634 123.85683 31.575893 117.25 35.857422 A 63.411564 60.375908 0 0 0 110.99609 33.408203 C 109.36493 25.686033 107.30073 17.865981 104.73633 9.9316406 L 75.412109 9.9316406 z M 90.478516 62.931641 A 28.109912 27.13449 0 0 1 118.58789 90.066406 A 28.109912 27.13449 0 0 1 90.478516 117.19922 A 28.109912 27.13449 0 0 1 62.369141 90.066406 A 28.109912 27.13449 0 0 1 90.478516 62.931641 z "
        transform="scale(0.26458333)" />
    </g>
    </svg>
    <p class="webpage__name">Opcje</p>
</div>
<div class="settings">
    <div class="settings-tabs">
        <ul>
            <li class="settings-tab"><a id="general" class="active" href="/profil/opcje">Ogólne</a></li>
            <li class="settings-tab"><a id="help" href="/profil/opcje/pomoc">Pomoc</a></li>
        </ul>
    </div>
    <div class="settings-content" id="settings-content">
        

    <?php $form = ActiveForm::begin(['id' => 'form-settings', 'options' => ['style' => 'padding-top: 25px; color: #FFF;']]); ?>

        <?= $form->field($model, 'first_name')->textInput(['autofocus' => true, 'placeholder' => 'Imię'])->label('Imię') ?>

        <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Nazwisko'])->label('Nazwisko') ?>

        <?= $form->field($model, 'city')->textInput(['placeholder' => 'Miasto'])->label('Miasto') ?>

        <?= $form->field($model, 'description')->textarea(['placeholder' => 'Description...'])->label('Opis') ?>

        <?= $form->field($model, 'is_private')->checkbox(['label' => ''])->label('Konto prywatne') ?>

        <div class="form-group">
            <?= Html::submitButton('Zarejestruj', ['class' => 'btn btn-primary btn-block', 'name' => 'save-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>