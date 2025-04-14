<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Урок: ' . Html::encode($lesson->title);
$this->params['breadcrumbs'][] = ['label' => 'Уроки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

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

    .lesson-content {
        max-width: 800px; /* Максимальная ширина контента */
        margin: 20px auto; /* Центрирование контента */
        padding: 20px; /* Паддинг вокруг контента */
        border: 2px solid #6a5acd; /* Фиолетовая обводка */
        border-radius: 10px; /* Закругление углов */
        background-color: white; /* Белый фон для контента */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Тень под контентом */
    }

    .exercise-question {
        font-size: 18px; /* Размер шрифта для вопроса */
        margin: 20px 0; /* Отступы сверху и снизу */
        color: #333; /* Темный цвет для текста */
    }

    .form-control {
        width: 100%; /* Полная ширина поля ввода */
        padding: 15px; /* Паддинг внутри поля */
        border: 2px solid #6a5acd; /* Фиолетовая обводка полей ввода */
        border-radius: 5px; /* Закругление углов полей ввода */
        margin-bottom: 20px; /* Отступ снизу */
    }

    .form-control:focus {
        border-color: #8a3ffc; /* Более светлая обводка при фокусе */
        box-shadow: 0 0 5px rgba(106, 92, 205, 0.5); /* Эффект тени при фокусе */
    }

    .btn-primary {
        background-color: #6a5acd; /* Основной цвет кнопки */
        border: none; /* Убираем границу кнопки */
        padding: 15px; /* Паддинг внутри кнопки */
        width: 100%; /* Полная ширина кнопки */
        border-radius: 5px; /* Закругление углов кнопки */
    }

    .btn-primary:hover {
        background-color: #8a3ffc; /* Более светлый оттенок при наведении */
    }

    .alert {
        max-width: 800px; /* Максимальная ширина уведомления */
        margin: 20px auto; /* Центрирование уведомления */
        padding: 15px; /* Паддинг внутри уведомления */
        border-radius: 5px; /* Закругление углов уведомления */
    }

    .alert-success {
        background-color: #d4edda; /* Светло-зеленый фон для успеха */
        color: #155724; /* Темно-зеленый цвет текста */
        border-color: #c3e6cb; /* Цвет границы для успешного уведомления */
    }

    .alert-danger {
        background-color: #f8d7da; /* Светло-красный фон для ошибки */
        color: #721c24; /* Темно-красный цвет текста */
        border-color: #f5c6cb; /* Цвет границы для опасного уведомления */
    }
</style>

<h1 style="font-weight: 750"><?= Html::encode($this->title) ?></h1>

<div class="lesson-content">
    <p><?= Html::encode($lesson->content) ?></p>

    <h2 class="exercise-question">Вопрос</h2>
    <p><?= Html::encode($lesson->exercise_question) ?></p>

    <?php $form = ActiveForm::begin(['action' => ['view', 'id' => $lesson->id], 'method' => 'post']); ?>

    <?= Html::textInput('user_answer', '', ['class' => 'form-control', 'placeholder' => 'Введите ваш ответ']) ?>

    <?= Html::submitButton('Ответить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

    <?php if ($correct !== null): ?>
        <?php if ($correct): ?>
            <div class="alert alert-success">Правильно, ты молодец!</div>
        <?php else: ?>
            <div class="alert alert-danger">Не правильно, попробуй еще раз!</div>
        <?php endif; ?>
    <?php endif; ?>
</div>