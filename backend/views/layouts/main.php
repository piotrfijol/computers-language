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

      <a class="navbar-brand" href="/"><img class="img-responsive img" src="/img/logo.png" alt=""></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item expandable" data-expand="false">
            <span class="nav-link text-white"><i class="fa-solid fa-graduation-cap nav-icon"></i> Nauka</span>
              <ul class="list-unstyled">
                <li><a class="nav-link" href="/manage/category/view">Kategorie</a></li>
                <li><a class="nav-link" href="/manage/course/view">Kursy</a></li>
                <li><a class="nav-link" href="/manage/chapter/view">Rozdziały</a></li>
                <li><a class="nav-link" href="/manage/lesson/view">Lekcje</a></li>
              </ul>
          </li>
          <li class="nav-item expandable" data-expand="false">
            <span class="nav-link text-white"><i class="fa-solid fa-question nav-icon"></i> Quizy</span>
                <ul class="list-unstyled">
                  <li><a class="nav-link" href="/manage/test/view">Testy</a></li>
                  <li><a class="nav-link" href="/manage/question/view">Pytania</a></li>
                </ul>
          </li>
          <?php if(Yii::$app->user->identity->isAdmin): ?>
          <li class="nav-item">
            <a class="nav-link" href="/manage/user/view"><i class="fa-solid fa-user nav-icon"></i> Użytkownicy</a>
          </li>
          <?php endif; ?>
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

        <h1 class="text-white text-center py-5 mb-5 page-title"><?= $this->title ?></h1>
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

<script>
  let expandables = document.querySelectorAll(".expandable");
  expandables.forEach(el => {

    if(hasActiveLink(el)) {
      el.querySelector(".nav-link").classList.add('active');
      el.dataset.expand = true;
    }

    el.addEventListener('click', (e) => {
      let expandVal = e.currentTarget.dataset.expand;
      expandVal = expandVal === 'true';
      e.currentTarget.dataset.expand = !expandVal;

    })
  })

  function setMenuActive() {
    let menuLinks = document.querySelectorAll('a.nav-link');
    menuLinks.forEach(el => {
      let link = el.href;
      let lastSlashId = link.lastIndexOf('/');
      if(lastSlashId) {
        link = new URL(link.slice(0, lastSlashId));

        if(window.location.pathname.startsWith(link.pathname)) {
          el.classList.add('active');
        }
      }
      
    });
  }

    function hasActiveLink(element) {
    let menuLinks = element.querySelectorAll('a.nav-link');
    let hasActiveLink = false;
    menuLinks.forEach(el => {
      let link = el.href;
      let lastSlashId = link.lastIndexOf('/');
      if(lastSlashId) {
        link = new URL(link.slice(0, lastSlashId));

        if(window.location.pathname.startsWith(link.pathname)) {
          hasActiveLink = true;
        }
    }});
    
    return hasActiveLink;
  }

  setMenuActive();
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
