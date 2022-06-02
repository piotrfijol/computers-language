
<div class="box">
    <p class="box__title">
    <span><?= htmlspecialchars($lesson->title) ?></span>
    </p>
    <div class="box__content">
        <p class="lesson">
            <?= htmlspecialchars($lesson->content) ?>
        </p>
        <div class="buttons">
            <form action="<?= Yii::$app->request->url ?>" method="POST">
                <input type="hidden" name="_csrf-frontend" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                <button class="btn" type="submit">Zakończ lekcję</button>
            </form>
        </div>
    </div>
</div>