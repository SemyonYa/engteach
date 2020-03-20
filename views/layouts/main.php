<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        <!-- TEMPORARY MENU -->
        <div class="container">
            <p><a href="/site/index"><strong>ГЛАВНАЯ</strong></a></p>
            <p><a href="/image/list">Менеджер картинок</a></p>
            <p><a href="/user/index">Пользователи</a></p>
            <p><?php if (Yii::$app->user->isGuest) : ?>
                    <a href="/site/login" class="btn btn-primary">LOGIN</a>
                <?php else : ?>
                    <?php
                    echo Html::beginForm(['/site/logout'], 'post');
                    echo Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'btn btn-link logout']
                    );
                    echo Html::endForm();
                    ?>
                <?php endif; ?>
        </div>
    </div>

    <footer>
        &copy; Eng <?= date('Y') ?>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

<!-- EngModalWrap -->
<div class="modal fade" id="EngModal" tabindex="-1" role="dialog" aria-labelledby="EngModalLabel" data-input-id="-">
    Загрузка...
</div>

<div class="modal fade" id="EngCommonModal" tabindex="-1" role="dialog" aria-labelledby="EngCommonModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                загрузка...
            </div>
        </div>
    </div>
</div>