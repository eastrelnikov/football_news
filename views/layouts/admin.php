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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
            'id' => 'main-menu'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Новости', 'items' => [
                ['label' => 'Просмотр новостей', 'url' => ['/news/show']],
                ['label' => 'Управление новостями', 'url' => ['/admin/news/index']],
            ]],
            ['label' => 'Результаты', 'url' => ['/events/results']],
            ['label' => 'События', 'items' => [
                ['label' => 'Просмотр событий', 'url' => ['/events/current/']],
                ['label' => 'Управление событиями', 'url' => ['/admin/events/index']],
            ]],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Пользователи', 'url' => ['/rbac/default/index']],
            ['label' => 'Справочники', 'items' => [
                ['label' => 'Спортсмены/команды', 'url' => ['/admin/participant/index/']],
                ['label' => 'Страны', 'url' => ['/admin/countries/index']],
                ['label' => 'Виды спорта', 'url' => ['/admin/kindofsports/index']],
            ]],
            ['label' => 'Главная', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
