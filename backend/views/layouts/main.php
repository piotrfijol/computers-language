<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
  <nav class="navbar navbar-fixed-left navbar-expand-lg navbar-dark">
    <div class="nav-box w-100">

      <a class="navbar-brand" href="#"><img class="img-responsive img" src="/img/logo.png" alt=""></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Lekcje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Testy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kategorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1">Użytkownicy</a>
          </li>
          <li class="nav-item">
            <?php
              echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
              . Html::submitButton(
                  'Wyloguj',
                  ['class' => 'nav-link text-decoration-none text-white']
              )
              . Html::endForm();
            ?>
          </li>
        </ul>

      </div>
    </div>
  </nav>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
