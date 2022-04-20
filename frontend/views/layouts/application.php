<?php

/** @var yii\web\View $this */

use frontend\assets\AppAsset;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Język komputerów</title>
        <?php $this->registerCsrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        
        <div class="wrapper">
            
        <!-- Navbar -->
        <nav class="nav-menu">
            <div class="nav-menu__brand">
                <img src="/img/logo.png" />            
            </div>
            <div class="nav-menu__item">
                <a class="item" href="/learn">
                <svg
                    class="nav-menu__item__icon"
                    viewBox="0 0 48 48"
                    version="1.1"
                    id="svg5"
                    inkscape:version="1.1 (c68e22c387, 2021-05-23)"
                    sodipodi:docname="learning_icon.svg"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <g
                        inkscape:label="Warstwa 1"
                        inkscape:groupmode="layer"
                        id="layer1">
                        <path
                        id="path4101"
                        style="fill-opacity:1;stroke:#d55b00;stroke-width:0.894625;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                        d="m 37.079317,20.306627 c 5e-6,0 -0.08321,1.677707 0.08393,1.278387 0,0 0.491767,0.248556 0.851992,0.556678 0.16233,0.138851 0.30226,0.303849 0.45339,0.455773 0.129423,0.191226 0.28054,0.368399 0.388268,0.573675 0.737198,1.404724 0.620636,3.095366 0.397677,4.618177 -0.07892,0.539023 -0.195861,1.071274 -0.293788,1.606911 -0.349888,1.603526 -0.878997,3.153702 -1.370979,4.713233 -0.143819,0.455896 -0.299278,0.908168 -0.426344,1.369421 -0.320331,1.162806 -0.331425,1.424064 -0.523428,2.600383 -0.07392,1.308371 0.120359,2.594579 0.400249,3.864567 0.08023,0.364038 0.178096,0.723625 0.267144,1.08544 l 2.60032,-1.486997 v 0 c -0.125974,-0.33064 -0.275019,-0.652742 -0.377923,-0.991916 -0.369409,-1.217582 -0.490284,-2.481124 -0.379952,-3.751648 0.05519,-0.411658 0.09482,-0.8259 0.165557,-1.234974 0.0744,-0.430205 0.173501,-0.855456 0.269531,-1.280995 0.453118,-2.007855 1.041662,-3.979417 1.542492,-5.974286 0.386511,-1.610662 0.437277,-1.6559 0.671052,-3.255263 0.149249,-1.021073 0.26166,-1.679676 0.13738,-2.686946 -0.03917,-0.317481 -0.108389,-0.634251 -0.219684,-0.932652 -0.08754,-0.234724 -0.246956,-0.433055 -0.370435,-0.649583 -0.137297,-0.180985 -0.265298,-0.370046 -0.411895,-0.542954 -0.379318,-0.447399 -0.14552,-0.705319 -0.885901,-0.575896 l -2.151248,0.547123 z M 8.576148,17.195788 20.130234,23.074939 37.079317,20.306627 M 28.427649,7.9154325 2.5186367,13.470847 8.576148,17.195788 c 0.014977,3.976407 0.029948,10.102905 -0.014986,12.618659 -0.1212892,6.790589 28.241406,8.615063 28.46803,0 0.06155,-2.339647 0.06413,-6.155638 0.05013,-9.50782 l 8.526095,-1.828323 z" />
                    </g>
                </svg>

                    <p class="nav-menu__item__label">Nauka</p>
                </a>
            </div>
            <div class="nav-menu__item">
                <a class="item" href="/profile">
                    <svg
                    class="nav-menu__item__icon"
                    viewBox="0 0 48 48"
                    id="svg5"
                    version="1.1"
                    sodipodi:docname="profile_icon.svg"
                    inkscape:version="1.1 (c68e22c387, 2021-05-23)"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <g
                        id="layer1"
                        transform="matrix(1.0553689,0,0,1.0424851,-1.4518567,-1.3212465)">
                        <ellipse
                        style="fill-rule:evenodd;stroke:#d55b00;stroke-width:0.877;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                        id="path409"
                        cx="24.050932"
                        cy="12.984825"
                        rx="9.2551737"
                        ry="8.5412302" />
                        <path
                        id="path1702"
                        style="fill-rule:evenodd;stroke:#d55b00;stroke-width:0.877;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                        d="m 24.137635,23.649427 a 16.284248,20.476752 0 0 0 -16.2841212,20.476766 16.284248,20.476752 0 0 0 0.00154,0.0489 H 40.420207 a 16.284248,20.476752 0 0 0 0.0015,-0.0489 16.284248,20.476752 0 0 0 -16.284079,-20.476766 z" />
                    </g>
                    </svg>

                    <p class="nav-menu__item__label">Profil</p>
                </a>
            </div>
            <div class="nav-menu__item">
                <a class="item" href="/profile/settings">
                <svg
                class="nav-menu__item__icon"
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
                    style="fill-opacity:1;fill-rule:evenodd;stroke:#e66c11;stroke-width:3.77953;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                    d="M 75.412109 9.9316406 C 73.137722 17.708638 71.237254 25.484722 69.6875 33.261719 A 63.411564 60.375908 0 0 0 62.248047 36.146484 C 56.25694 32.046513 50.115623 28.094894 43.826172 24.289062 L 22.945312 44.876953 C 26.620947 50.619019 30.34172 56.332557 34.150391 61.992188 A 63.411564 60.375908 0 0 0 29.435547 72.699219 C 22.615487 74.193141 15.798263 75.883202 8.9863281 77.763672 L 9.6035156 107.08203 C 16.528671 108.39864 23.464631 109.65776 30.423828 110.80859 A 63.411564 60.375908 0 0 0 33.890625 118.32617 C 29.771041 124.27232 25.796167 130.36729 21.966797 136.61133 L 42.429688 157.61523 C 49.117924 153.3899 55.769463 149.10433 62.341797 144.68945 A 63.411564 60.375908 0 0 0 70.125 147.67383 C 71.622146 155.66496 73.385848 163.65732 75.412109 171.64844 L 104.73633 171.64844 C 106.41325 163.73792 108.0181 155.81006 109.4668 147.84766 A 63.411564 60.375908 0 0 0 113.625 146.43164 C 120.76932 151.26041 128.36229 155.81179 136.48047 160.03711 L 157.36328 139.44922 C 153.66632 132.58077 149.71469 125.96295 145.53906 119.56641 A 63.411564 60.375908 0 0 0 150.00781 109.94531 C 157.02095 108.24078 164.10954 106.16982 171.2832 103.68359 L 170.66797 74.365234 C 163.63021 72.466645 156.59766 70.871283 149.57227 69.560547 A 63.411564 60.375908 0 0 0 147.00586 63.84375 C 150.96199 57.817679 154.72476 51.472812 158.26562 44.767578 L 137.80273 23.763672 C 130.69754 27.533634 123.85683 31.575893 117.25 35.857422 A 63.411564 60.375908 0 0 0 110.99609 33.408203 C 109.36493 25.686033 107.30073 17.865981 104.73633 9.9316406 L 75.412109 9.9316406 z M 90.478516 62.931641 A 28.109912 27.13449 0 0 1 118.58789 90.066406 A 28.109912 27.13449 0 0 1 90.478516 117.19922 A 28.109912 27.13449 0 0 1 62.369141 90.066406 A 28.109912 27.13449 0 0 1 90.478516 62.931641 z "
                    transform="scale(0.26458333)" />
                </g>
                </svg>

                    <p class="nav-menu__item__label">Opcje</p>
                </a>
            </div>
            <div class="nav-menu__item">
                <form action="/site/logout" method="POST" style="height: 100%;">
                    <input type="hidden" name="_csrf-frontend" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <button class="item logout" type="submit">
                    <svg
                    class="nav-menu__item__icon"
                    viewBox="0 0 48 48"
                    version="1.1"
                    id="svg8902"
                    sodipodi:docname="logout_icon.svg"
                    inkscape:version="1.1 (c68e22c387, 2021-05-23)"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <g
                        inkscape:label="Warstwa 1"
                        inkscape:groupmode="layer"
                        id="layer1">
                        <path
                        id="path11684"
                        style="stroke:#e66c11;stroke-width:0.806846;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                        d="m 39.0959,13.059239 0.145543,6.281136 -4.85254,-0.07191 H 14.680094 v 8.774915 h 19.708809 v 0.0042 l 4.634645,-0.142586 0.07235,6.066642 8.571864,-10.349122 z" />
                        <rect
                        style="stroke:#e66c11;stroke-width:1;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                        id="rect12271"
                        width="25.559679"
                        height="40.641964"
                        x="8.9425907"
                        y="3.4623215" />
                    </g>
                    </svg>

                        <p class="nav-menu__item__label">Wyloguj</p>
                    </button>
                </form>
               
            </div>
        </nav>
            <?= $content ?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();