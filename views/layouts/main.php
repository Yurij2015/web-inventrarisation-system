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
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "WIS",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Приемка', 'url' => ['/acceptmaterial/index']],
            ['label' => 'Сотрудники', 'url' => ['/employee/index']],
            ['label' => 'Инвентаризация', 'url' => ['/inventarisation/index']],
            ['label' => 'Материалы', 'url' => ['/material/index']],
            ['label' => 'Категории', 'url' => ['/materialcategory/index']],
            ['label' => 'Хранение', 'url' => ['/materialstorage/index']],
            ['label' => 'Склады', 'url' => ['/storehouse/index']],
            ['label' => 'Перевозчики', 'url' => ['/transporter/index']],
            ['label' => 'Поставщики', 'url' => ['/vendor/index']],


            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
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

<footer class="footer">
</body>
<div class="container">
    <p class="pull-left">&copy; Система инвентаризации <?= date('Y') ?></p>

    <p class="pull-right">WIS</p>
</div>
</footer>

<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
