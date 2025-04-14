<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Форум иностранных языков';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Добавляем стили для дизайна -->
<style>
    /* Общие стили для страницы */
    body {
        background: #f2f2f7; /* Светлый фон для всей страницы */
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }

    /* Основные стили для форума */
    .forum-index {
        background: linear-gradient(135deg, #9a8638, #9da9e9); /* Нежно-фиолетовый фон */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 1000px;
        margin: 0 auto; /* Центрируем контейнер */
        text-align: center; /* Центрируем содержимое */
        transition: all 0.3s ease;
    }

    .forum-index:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    /* Стили заголовка */
    .forum-index h1 {
        font-size: 36px;
        color: #ffffff; /* Темный фиолетовый цвет для заголовка */
        text-align: center;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.1);
        animation: fadeIn 1.5s ease-out;
    }

    /* Кнопка создания темы */
    .btn-success {
        background-color: #9674d7; /* Фиолетовая кнопка */
        border-color: #6a3ab2;
        color: white;
        font-size: 16px;
        border-radius: 25px;
        padding: 12px 24px;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: slideIn 1s ease-out;
    }

    .btn-success:hover {
        background-color: #5b2c92; /* Темно-фиолетовый при наведении */
        border-color: #5b2c92;
        transform: scale(1.05);
    }

    /* Стили для списка тем */
    .list-view {
        margin-top: 20px;
        animation: fadeInUp 1s ease-out;
    }

    /* Стили для каждого элемента в списке */
    .list-view .item {
        background: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
        opacity: 0;
        animation: fadeInItem 1s forwards;
    }

    .list-view .item:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /* Анимация для появления элементов */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInItem {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    /* Анимация для кнопок */
    @keyframes slideIn {
        0% {
            transform: translateX(-50px);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Стили для ссылок */
    a {
        color: #ffffff; /* Цвет для ссылок */
        text-decoration: underline;
    }

    a:hover {
        color: #2f3b73; /* Тёмно-синий при наведении */
    }
</style>

<div class="forum-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <meta name="keywords" content="Форум для иностранных языков, иностранные языки, ">
    <meta name="description" content="Удобный форум для тех кто изучает иностранные языки">

    <p>
        <?= Html::a('Создать новую тему', ['create-topic'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'forum_topic_item', // Используем отдельный шаблон для темы
        'options' => ['class' => 'list-view'], // Добавляем класс для ListView
    ]); ?>

</div>
