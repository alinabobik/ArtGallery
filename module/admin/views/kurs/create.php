<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Kurs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kurs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true])->label('Изображение') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Описание') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success save-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .save-button {
        background-color: #9a8638; /* Нежно фиолетовый цвет фона кнопки */
        color: white; /* Цвет текста кнопки */
        border: none;
        border-radius: 5px;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .save-button:hover {
        background-color: #9a8638; /* Цвет фона кнопки при наведении */
    }

    .form-group {
        margin-top: 15px; /*  Отступ между полями и кнопкой */
    }
</style>