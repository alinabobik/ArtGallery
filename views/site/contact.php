<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Контакты';
?>
<div class="site-contact">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо за ваше сообщение. Мы свяжемся с вами в ближайшее время.
        </div>

    <?php else: ?>

        <p class="text-center">
            Если у вас есть вопросы или предложения, пожалуйста, заполните форму ниже, чтобы связаться с нами. Мы всегда рады вашим обращениям.
        </p>

        <div class="row">
            <div class="col-lg-6">

                <h3>Наши контакты:</h3>
                <ul>
                    <li><strong>Адрес:</strong> г. Курган, ул. Карельцева 32</li>
                    <li><strong>Телефон:</strong> 8(800)-555-35-35</li>
                </ul>

                <h3>Наша карта:</h3>
                <div style="width: 100%; height: 300px; border: 1px solid #ddd; border-radius: 10px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14808.738138670303!2d65.3347246!3d55.4566616!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43e3b50d945712ef%3A0x416400fa6e42c1cd!2z0J3QvtGC0LXRgdC60LXR!5e0!3m2!1sru!2sru!4v1675819307545!5m2!1sru!2sru"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

            </div>

            <div class="col-lg-6">

                <h3>Свяжитесь с нами:</h3>

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Ваше имя') ?>

                <?= $form->field($model, 'email')->label('Ваш email') ?>

                <?= $form->field($model, 'subject')->label('Тема сообщения') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Сообщение') ?>


                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

<style>
    .site-contact {
        font-family: 'Playfair Display', serif;
        padding: 50px;
    }

    .site-contact h1 {
        font-size: 36px;
        color: #333;
    }

    .site-contact h3 {
        font-size: 28px;
        color: #333;
        margin-top: 30px;
    }

    .text-center {
        text-align: center;
    }

    .alert-success {
        margin-top: 20px;
        padding: 20px;
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .form-group {
        margin-top: 20px;
    }

    .btn-primary {
        background-color: #e2b97f;
        border-color: #e2b97f;
    }

    .btn-primary:hover {
        background-color: #c49c6c;
        border-color: #c49c6c;
    }

    iframe {
        border-radius: 10px;
    }

    .row {
        margin-top: 30px;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .col-lg-6 {
            width: 100%;
        }
    }
</style>
