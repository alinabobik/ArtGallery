<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Девушка с жемчужной серёжкой</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Основные стили для страницы */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f5f9;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #afa484, #c2a171); /* Нежные желто-охровые оттенки */
            color: white;
            padding: 100px 0;
            text-align: center;
            border-radius: 20px;
        }

        header h1 {
            font-size: 50px;
            margin: 0;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
        }

        header p {
            font-size: 20px;
            margin-top: 20px;
            opacity: 0.9;
        }

        .header-btn {
            display: inline-block;
            background-color: #fff;
            color: #e5cfa6;
            font-size: 18px;
            padding: 12px 30px;
            border: none;
            font-weight: 650;
            border-radius: 30px;
            cursor: pointer;
            text-transform: uppercase;
            margin-top: 20px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .header-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        section {
            padding: 60px 20px;
            text-align: center;
        }

        .about-artwork {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out 0.5s forwards;
        }

        .about-artwork h2 {
            font-size: 32px;
            color: #e5cfa6;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
        }

        .about-artwork p {
            font-size: 18px;
            color: #555;
            line-height: 1.8;
        }

        .artwork-image {
            margin-top: 30px;
            max-width: 80%;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out 1s forwards;
        }

        .feature {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .feature h3 {
            font-size: 22px;
            color: #e5cfa6;
            margin-bottom: 20px;
        }

        .feature p {
            font-size: 16px;
            color: #777;
        }

        .artwork-info {
            background-color: #f8f9fc;
            padding: 60px 20px;
        }

        .artwork-info h2 {
            font-size: 30px;
            color: #e5cfa6;
            margin-bottom: 20px;
        }

        .artwork-info1 h2 {
            font-size: 30px;
            color: #a69579;
            margin-bottom: 20px;
        }

        .artwork-info p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        /* Анимация появления */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>

<header>
    <h1>Девушка с жемчужной серёжкой</h1>
    <p>Картина Яна Вермеера - символ красоты и таинственности</p>
    <!-- Кнопка-ссылка -->
    <a href="https://app.tridego.com/" class="header-btn">Посетить галерею</a>
</header>

<section class="about-artwork">
    <h2>О картине</h2>
    <p>“Девушка с жемчужной серёжкой” — одно из самых известных произведений голландского художника Яна Вермеера, написанное около 1665 года. Картина изображает молодую женщину в средневековом костюме с яркой голубой вуалью и жемчужной серёжкой. Ее взгляд проникновенный и загадочный, что делает картину особенно популярной и привлекательной для зрителей.</p>
</section>

<section>

    <?= \yii\bootstrap5\Html::img('@web/image/devu.jpg', ['alt' => 'Девушка с жемчужной серёжкой','class'=>'artwork-image']) ?>
</section>

<section class="features">
    <div class="feature">
        <h3>История картины</h3>
        <p>Картина написана в период "Золотого века" Голландии. Она не имеет точного названия, но по преобладанию жемчужной серёжки, она стала известной под этим именем.</p>
    </div>
    <div class="feature">
        <h3>Использование света</h3>
        <p>Вермеер мастерски использовал свет и тень, создавая драматический контраст, который подчеркивает красоту и выразительность лица девушки.</p>
    </div>
    <div class="feature">
        <h3>Мифы и легенды</h3>
        <p>Множество мифов окружают картину, включая идеи о том, что это была реальная модель, а также что девушка на картине — сама жена художника.</p>
    </div>
</section>

<section class="artwork-info">
    <h2>Значение картины</h2>
    <p>Картина известна своей загадочностью. На ней не изображена ни детальная сцена, ни контекст. Это просто портрет, в котором выражение лица и взгляд девушки говорят больше, чем любые слова. В картине также ярко прослеживается влияние восточной культуры на искусство Европы XVII века.</p>
</section>
<section class="artwork-info1">
    <h2>Отзывы</h2>
</section>


<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',

    'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'col-form-label'],
        'inputOptions' => ['class' => 'form-control'],
        'errorOptions' => ['class' => 'invalid-feedback'],
    ],
]); ?>

<?= $form->field($model, 'description')->textarea()->label('Комментарий') ?>



<?= Html::submitButton('Оставить отзыв', ['class' => 'btn btn-dark m-1', 'name' => 'login-button']) ?>


<?php ActiveForm::end(); ?>

<?php foreach ($comments as $k): ?>
<?php //\yii\helpers\VarDumper::dump($comments, 10,true)?>
    <div class="card" style="margin: 20px">

        <div class="card-header">
            <?php echo $k->user->fio() ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <?php echo $k['description'] ?>

            </blockquote>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>
