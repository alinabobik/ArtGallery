<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kurs $model */

$this->title = 'Редактирование курса: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="kurs-update">

    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>

    <div class="update-form-container">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>


    </div>

</div>

<style>
    /* Общие стили */
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        color: #343a40;
    }

    .kurs-update {
        padding: 20px;
        background-color: #f2f0fc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        animation: fadeIn 1.5s ease-out;
    }

    .page-title {
        color: #7787e1;
        text-align: center;
        margin-bottom: 20px;
        font-size: 32px;
        font-weight: bold;
    }

    /* Стили для формы */
    .update-form-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1.5s ease-out;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        color: #555;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #7787e1;
        outline: none;
    }

    /* Стили для кнопки */
    .btn-primary {
        background-color: #6a4fb7; /* Тёмно-фиолетовый оттенок */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #9da9ea; /* Легкий фиолетовый оттенок при наведении */
        transform: scale(1.05);
    }

    /* Анимация для появления контента */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
