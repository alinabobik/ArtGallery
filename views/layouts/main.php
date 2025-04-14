<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Yii::getAlias('@web/images/art-icon.png')]);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style="font-family: 'Playfair Display', serif;">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'ArtGallery',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-transparent fixed-top',
            'style' => 'backdrop-filter: blur(10px); background: rgba(0, 0, 0, 0.5);',
        ],
    ]);

    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index'], 'options' => ['class' => 'nav-item']],
        ['label' => 'Галерея', 'url' => ['/site/kurs'], 'options' => ['class' => 'nav-item']],
        // Добавляем пункт "Выложить картину", если пользователь авторизован
        Yii::$app->user->isGuest ? null : ['label' => 'Выложить картину', 'url' => ['/site/proposal'], 'options' => ['class' => 'nav-item']],
        ['label' => 'Контакты', 'url' => ['/site/contact'], 'options' => ['class' => 'nav-item']],
    ];

    // Убираем элементы с null значением
    $menuItems = array_filter($menuItems, function($item) {
        return $item !== null;
    });

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav mx-auto'],
        'items' => $menuItems,
    ]);

    // Блок для кнопок "Войти" и "Регистрация"
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => Yii::$app->user->isGuest ? [
            ['label' => 'Регистрация', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item']],
            ['label' => 'Войти', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item']],
        ] : [
            '<li class="nav-item">'
            . Html::beginForm(['/site/logout'])
            . Html::submitButton(
                'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>',
        ],
    ]);

    NavBar::end();
    ?>
</header>

<style>
    .navbar-nav .nav-link {
        color: #fff;
        font-size: 18px;
        transition: all 0.3s;
    }
    .navbar-nav .nav-link:hover {
        color: #f4d47c;
    }
    .logo {
        height: 50px;
    }
    .logout {
        color: #000 !important;  /* Сделаем текст кнопки "Выход" черным */
        border: none;
        background: none;
        cursor: pointer;
        font-size: 16px; /* Размер шрифта */
    }

    .logout:hover {
        color: #000; /* Текст остаётся черным при наведении */
    }

    .logout:focus {
        outline: none; /* Убираем контур при фокусе */
    }

    /* Убираем фон у кнопки "Выход" и делаем текст черным */
    .navbar-nav .nav-item .logout {
        padding: 0.5rem 1rem; /* Добавление отступов */
        background-color: transparent;
        border-radius: 4px;
    }

    /* Убираем фоновый цвет при наведении */
    .navbar-nav .nav-item .logout:hover {
        background-color: transparent;
    }
</style>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container mt-5 pt-5">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
