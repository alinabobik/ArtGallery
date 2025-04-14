<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Тесты';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 style="font-weight: 750"><?= Html::encode($this->title) ?></h1>

<ul class="lesson-list">
    <?php foreach ($lessons as $lesson): ?>
        <li>
            <?= Html::a(Html::encode('Английский язык'), 'https://interacty.me/projects/5966e19018ed3c38', ['class' => 'lesson-link']) ?>
        </li>
    <?php endforeach; ?>
    <img src="image/star.png" alt="звезда" class="flying-star">
</ul>

<ul class="lesson-list">
    <?php foreach ($lessons as $lesson): ?>
        <li>
            <?= Html::a(Html::encode($lesson->title), ['lesson/view', 'id' => $lesson->id], ['class' => 'lesson-link']) ?>
        </li>
    <?php endforeach; ?>
</ul>


<style>
    body {
        background-color: #f8f9fa; /* Светлый фон для всей страницы */
        font-family: 'Arial', sans-serif; /* Основной шрифт */
    }

    h1 {
        text-align: center; /* Центрирование заголовка */
        color: #6a5acd; /* Фиолетовый цвет заголовка */
        margin-top: 50px; /* Отступ сверху */
    }

    .lesson-list {
        display: flex;
        flex-direction: column; /* Расположение элементов в колонку */
        align-items: center; /* Центрирование по горизонтали */
        list-style: none; /* Убираем маркеры у списка */
        padding: 0; /* Убираем отступы */
        margin: 0; /* Убираем отступы */
    }

    .lesson-list li {
        margin: 15px 0; /* Отступы между элементами списка */
        width: 100%; /* Занимаем всю ширину */
        max-width: 400px; /* Максимальная ширина элемента */
        border: 2px solid #6a5acd; /* Фиолетовая обводка */
        border-radius: 10px; /* Закругление углов */
        background-color: white; /* Белый фон для элементов списка */
        transition: box-shadow 0.3s, transform 0.3s; /* Плавные эффекты при наведении */
    }

    .lesson-list li:hover {
        box-shadow: 0 4px 15px rgba(106, 92, 205, 0.3); /* Тень при наведении */
        transform: translateY(-2px); /* Подъем при наведении */
    }

    .lesson-link {
        display: block; /* Делаем ссылку блочным элементом */
        padding: 15px; /* Отступы внутри элемента */
        text-align: center; /* Центрируем текст ссылки */
        color: #6a5acd; /* Фиолетовый цвет текста */
        text-decoration: none; /* Убираем подчеркивание */
        font-size: 18px; /* Размер шрифта */
    }

    .lesson-link:hover {
        color: #8a3ffc; /* Более светлый цвет при наведении */
        text-decoration: underline; /* Подчеркивание при наведении */
    }

    .flying-star {
        width: 100px; /* Задайте нужный размер для звезды */
        animation: fly 5s infinite alternate ease-in-out;
        margin-top: 20px; /* Отступ сверху для звезды */
    }

    @keyframes fly {
        0% {
            transform: translate(0, 0) rotate(0deg);
        }
        50% {
            transform: translate(20px, -20px) rotate(20deg);
        }
        100% {
            transform: translate(-20px, 20px) rotate(-20deg);
        }
    }
</style>