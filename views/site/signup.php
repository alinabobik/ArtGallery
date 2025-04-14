<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>

<style>
    body {
        background-color: #f0f0f0; /* Легкий светлый фон, подходящий для галереи */
        font-family: 'Arial', sans-serif; /* Основной шрифт */
    }

    .site-login {
        max-width: 600px; /* Более широкая форма */
        margin: 100px auto; /* Центрирование формы */
        padding: 40px; /* Паддинг вокруг формы */
        border-radius: 20px; /* Закругленные углы */
        background-color: #fff; /* Белый фон для формы */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Легкая тень под формой */
        border: 1px solid #f1c27d; /* Мягкий охровый оттенок */
    }

    h1 {
        text-align: center; /* Центрирование заголовка */
        color: #cba15b; /* Нежно охровый цвет заголовка */
        font-family: 'Georgia', serif; /* Шрифт для заголовков */
        margin-bottom: 30px; /* Отступ снизу */
        font-size: 32px; /* Размер шрифта */
    }

    .form-control {
        border-radius: 5px; /* Закругленные углы полей ввода */
        border: 2px solid #f1c27d; /* Охровая обводка полей ввода */
        padding: 15px; /* Паддинг внутри поля */
        font-size: 16px; /* Размер шрифта */
        transition: border-color 0.3s ease; /* Плавное изменение цвета границы */
    }

    .form-control:focus {
        border-color: #f0a800; /* Более насыщенный желтый цвет при фокусе */
        box-shadow: 0 0 8px rgba(240, 168, 0, 0.5); /* Легкая тень при фокусе */
    }

    .btn-primary {
        background-color: #f0a800; /* Насыщенный желтый цвет кнопки */
        border: none; /* Убираем границу кнопки */
        padding: 15px; /* Паддинг внутри кнопки */
        width: 100%; /* Кнопка на всю ширину */
        border-radius: 10px; /* Закругление углов кнопки */
        font-size: 18px; /* Размер шрифта на кнопке */
        margin-top: 20px; /* Отступ сверху */
        cursor: pointer; /* Указатель на кнопке */
        transition: background-color 0.3s ease; /* Плавное изменение фона при наведении */
    }

    .btn-primary:hover {
        background-color: #f4bc2e; /* Более темный желтый оттенок при наведении */
    }

    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #f0a800; /* Желтый цвет для контрольного поля при выделении */
        border-color: #f0a800; /* Цвет границы */
    }

    /* Для текстов и других элементов, которые добавляют художественный стиль */
    .form-control,
    .btn-primary {
        font-family: 'Georgia', serif; /* Используем более художественные шрифты */
    }

    .site-login h2 {
        font-family: 'Georgia', serif;
        font-size: 24px;
        color: #f0a800;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Стиль для текста подсказки */
    .form-text {
        color: #a68e6f; /* Теплый серый оттенок подсказок */
        font-size: 14px;
        text-align: center;
        margin-top: 15px;
    }

    /* Стиль для ссылок */
    .form-link {
        color: #f0a800; /* Цвет для ссылок */
        text-decoration: none;
        font-size: 14px;
        display: block;
        text-align: center;
        margin-top: 10px;
    }

    .form-link:hover {
        text-decoration: underline;
    }
</style>

<div class="site-login">
    <h1><?= Html::encode('Регистрация для художников') ?></h1> <!-- Заголовок -->

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-form-label'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput()->label('Логин') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

    <?= $form->field($model, 'surname')->textInput()->label('Фамилия') ?>

    <?= $form->field($model, 'name')->textInput()->label('Имя') ?>

    <?= $form->field($model, 'patronymic')->textInput()->label('Отчество') ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '+7-999-999-9999',
    ])->label('Номер телефона') ?>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Почта') ?>

    <div class="form-group">
        <div class="offset-lg-3 col-lg-6">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="form-text">
        Уже есть аккаунт? <a href="artgallery/web/index.php?r=site%2Flogin" class="form-link">Войдите</a>
    </div>
</div>
