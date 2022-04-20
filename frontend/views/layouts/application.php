<?php

/** @var yii\web\View $this */

use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Język komputerów</title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <!-- Navbar -->
        <nav class="nav-menu">
            <div class="nav-menu__brand">
                <logo-icon />
            </div>
            <div class="nav-menu__item">
                <router-link to="/learn">
                    <learn-icon class="nav-menu__item__icon"/>
                    <p class="nav-menu__item__label">Nauka</p>
                </router-link>
            </div>
            <div class="nav-menu__item">
                <router-link to="/profile">
                    <profile-icon class="nav-menu__item__icon"/>
                    <p class="nav-menu__item__label">Profil</p>
                </router-link>
            </div>
            <div class="nav-menu__item">
                <router-link to="/profile/settings">
                    <settings-icon class="nav-menu__item__icon"/>
                    <p class="nav-menu__item__label">Opcje</p>
                </router-link>
            </div>
            <div class="nav-menu__item">
                <router-link to="/logout">
                    <logout-icon class="nav-menu__item__icon"/>
                    <p class="nav-menu__item__label">Wyloguj</p>
                </router-link>
            </div>
        </nav>
        <?= $content ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();