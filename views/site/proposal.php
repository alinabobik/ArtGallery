<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Выложить картину';

$this->registerCss("
    .btn-ochre {
        background-color: #CC9A00; /* Цвет охры */
        color: white; /* Цвет текста */
        border: none; /* Убираем границу */
    }
    .btn-ochre:hover {
        background-color: #B88A00; /* Цвет при наведении */
    }
");

?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput() ?>

            <?= $form->field($model, 'body')->textArea() ?>

            <?= $form->field($model, 'image')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-ochre', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>