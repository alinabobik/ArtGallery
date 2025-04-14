<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $topic app\models\ForumTopic */

$this->title = 'Создать новую тему';
$this->params['breadcrumbs'][] = ['label' => 'Форум', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="forum-create-topic">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($topic, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Введите название темы']) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    /* Общие стили для страницы */
    body {
        background: #f2f2f7; /* Светлый фон для всей страницы */
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }

    /* Основные стили для создания темы */
    .forum-create-topic {
        background: linear-gradient(135deg, #9da9e9, #e2b9f7); /* Нежно-фиолетовый фон */
        padding: 40px;
        border-radius: 15px;
        max-width: 650px;
        margin: 50px auto;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .forum-create-topic:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .forum-create-topic h1 {
        color: #ffffff; /* Темный фиолетовый */
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 600;
        letter-spacing: 0.5px;
        animation: fadeIn 1.5s ease-out;
    }

    /* Стили для полей формы */
    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #6c757d;
        font-size: 18px;
        font-weight: 500;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 15px;
        border: 2px solid #ced4da;
        border-radius: 8px;
        font-size: 18px;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        margin-top: 10px;
    }

    .form-group input[type="text"]:focus {
        outline: none;
        border-color: #6a3ab2; /* Фиолетовый цвет при фокусе */
        box-shadow: 0 0 0 0.2rem rgba(106, 58, 178, 0.25);
    }

    /* Стили для кнопки */
    .btn-success {
        background-color: #6a3ab2; /* Фиолетовая кнопка */
        border-color: #6a3ab2;
        color: white;
        font-size: 16px;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: slideIn 1s ease-out;
    }

    .btn-success:hover {
        background-color: #5b2c92; /* Темно-фиолетовый при наведении */
        border-color: #5b2c92;
        transform: scale(1.05);
    }

    /* Анимация для заголовка */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    /* Анимация появления кнопки */
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
</style>
