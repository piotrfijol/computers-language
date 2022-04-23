
<div class="webpage">
    <svg
        class="webpage__icon"
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
            style="fill: transparent; fill-opacity:1;stroke:#d55b00;stroke-width:0.894625;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
            d="m 37.079317,20.306627 c 5e-6,0 -0.08321,1.677707 0.08393,1.278387 0,0 0.491767,0.248556 0.851992,0.556678 0.16233,0.138851 0.30226,0.303849 0.45339,0.455773 0.129423,0.191226 0.28054,0.368399 0.388268,0.573675 0.737198,1.404724 0.620636,3.095366 0.397677,4.618177 -0.07892,0.539023 -0.195861,1.071274 -0.293788,1.606911 -0.349888,1.603526 -0.878997,3.153702 -1.370979,4.713233 -0.143819,0.455896 -0.299278,0.908168 -0.426344,1.369421 -0.320331,1.162806 -0.331425,1.424064 -0.523428,2.600383 -0.07392,1.308371 0.120359,2.594579 0.400249,3.864567 0.08023,0.364038 0.178096,0.723625 0.267144,1.08544 l 2.60032,-1.486997 v 0 c -0.125974,-0.33064 -0.275019,-0.652742 -0.377923,-0.991916 -0.369409,-1.217582 -0.490284,-2.481124 -0.379952,-3.751648 0.05519,-0.411658 0.09482,-0.8259 0.165557,-1.234974 0.0744,-0.430205 0.173501,-0.855456 0.269531,-1.280995 0.453118,-2.007855 1.041662,-3.979417 1.542492,-5.974286 0.386511,-1.610662 0.437277,-1.6559 0.671052,-3.255263 0.149249,-1.021073 0.26166,-1.679676 0.13738,-2.686946 -0.03917,-0.317481 -0.108389,-0.634251 -0.219684,-0.932652 -0.08754,-0.234724 -0.246956,-0.433055 -0.370435,-0.649583 -0.137297,-0.180985 -0.265298,-0.370046 -0.411895,-0.542954 -0.379318,-0.447399 -0.14552,-0.705319 -0.885901,-0.575896 l -2.151248,0.547123 z M 8.576148,17.195788 20.130234,23.074939 37.079317,20.306627 M 28.427649,7.9154325 2.5186367,13.470847 8.576148,17.195788 c 0.014977,3.976407 0.029948,10.102905 -0.014986,12.618659 -0.1212892,6.790589 28.241406,8.615063 28.46803,0 0.06155,-2.339647 0.06413,-6.155638 0.05013,-9.50782 l 8.526095,-1.828323 z" />
        </g>
    </svg>
    <p class="webpage__name">Lekcje</p>
</div>

<div class="box">
    <div class="box__content">
            <ul class="lessons-list">
            <?php foreach($lessons as $lesson): ?>
                <a href="<?= Yii::$app->request->url . '/' . $lesson->slug ?>" class="link"><li><?= $lesson->title?></li></a>
            <?php endforeach; ?>
                <a href="" class="link"><li>Test wiedzy</li></a>
            </ul>
    </div>
</div>