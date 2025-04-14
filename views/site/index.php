<?php
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кнопка с эффектом пульсации</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>

        /* Стиль пульсации для кнопки */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 rgba(255, 255, 255, 0.1);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 10px rgb(154, 134, 56);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 rgba(106, 92, 205, 0);
            }
        }

        .pulsate {
            animation: pulse 5s infinite;
        }

        .button {
            background: linear-gradient(90deg, #af673a, #FFD700); /* темно-коричневато-желтый */
            border: none;
            color: white; /* белый текст */
            padding: 15px 30px;
            font-size: 18px;
            font-family: 'Playfair Display', serif; /* Используем шрифт Playfair Display */
            border-radius: 25px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            transition: background 0.3s ease, color 0.3s ease;
            margin-top: 20px;
        }


        .button:hover {
            color: #e0e0e0;
        }

        /* Стиль карточек */
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: bold;
            font-family: 'Playfair Display', serif; /* Используем шрифт Playfair Display */
            margin-bottom: 15px;
        }

        .btn-custom {
            background-color: rgba(255, 255, 255, 0.1);
            color: #000000;
            border-radius: 20px;
        }

        .btn-custom:hover {
            background-color: rgba(168, 168, 90, 0.1);
        }

        .description-text {
            color: #6c757d;
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 200px;
            object-fit: cover;
        }

        .rotate {
            animation: rotate-left-right 9s ease-in-out infinite;
        }
    </style>
</head>
<body>
<div class="container" style="display: flex; align-items: flex-start; justify-content: center; height: 80vh; padding: 5% 8%;">
    <!-- Левая часть с картинкой -->
    <div style="flex: 1; display: flex; justify-content: center;">
        <img src="image/gall.jpg" alt="картинка худ" style="max-width: 400px; height: auto; border-radius: 10px;">
    </div>

    <!-- Правая часть с текстом -->
    <div style="flex: 1; text-align: left;">
        <h1 style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 36px; line-height: 1.3;">
            Онлайн-галерея для творчества и вдохновения
        </h1>
        <p style="font-weight: normal; font-family: 'Playfair Display', serif; font-size: 20px; line-height: 1.6;">
            Откройте для себя уникальные произведения искусства и делитесь ими с друзьями. Наша онлайн галерея поможет вам развить творческий потенциал, а также научит работать с различными видами визуальных медиа.
        </p>
        <a href="https://app.tridego.com/" class="button pulsate" id="myBtn"
           style="display: inline-block; padding: 14px 28px; font-size: 18px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; margin-top: 10px;">
            Посетить галерею
        </a>
    </div>
</div>

<!-- Контейнер с изображениями -->
<div class="body-content"></div>
<style>
    .image-container {
        position: relative;
        width: 100%;
        max-width: 1376px;
        height: 70px;
        border-radius: 16px;
        overflow: hidden;
        margin-top: -200px;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Playfair Display;
        font-weight: 400;
        font-size: 26px;
        line-height: 38px;
        letter-spacing: -1px;
        color: #000000;
        cursor: pointer;
    }
</style>
<div class="container text-center" style="margin-top: 0px">
    <div class="image-container">
        <span class="text-overlay">ArtGallery ArtGallery ArtGallery ArtGallery ArtGallery ArtGallery ArtGallery</span>
    </div>
</div>

<style>
    .image-container {
        position: relative;
        width: 100%;
        height: 70px;
        border-radius: 16px;
        overflow: hidden;
        margin-top: -200px;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 100%;  /* Начальная позиция текста за пределами экрана справа */
        transform: translateY(-50%);
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 36px; /* Сделал текст больше */
        color: #3a3737;
        white-space: nowrap;
        animation: scroll-text 12s linear infinite;  /* Анимация с более медленным движением */
    }

    @keyframes scroll-text {
        0% {
            left: 100%;  /* Начало анимации: текст справа за пределами экрана */
        }
        50% {
            left: 0%; /* В середине анимации текст в центре экрана */
        }
        100% {
            left: -100%;  /* Конец анимации: текст выходит за пределы экрана слева */
        }
    }
</style>


<!-- Стиль карточек и контент -->
<div class="container my-5">
    <div class="row" style="margin-top: 150px">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="image/cartina.jpg" class="card-img-top" alt="Картина 1">
                <div class="card-body">
                    <h2 class="card-title">Современное искусство</h2>
                    <p class="description-text">Откройте для себя удивительные работы современных художников, которые вдохновляют на новые идеи и эксплорацию.</p>
                    <p><a class="btn btn-custom" href="https://app.tridego.com/">Узнать больше</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="image/cartina.jpg" class="card-img-top" alt="Картина 2">
                <div class="card-body">
                    <h2 class="card-title">Историческое искусство</h2>
                    <p class="description-text">Погрузитесь в богатство истории искусства и откройте для себя произведения, которые сформировали мировую культуру.</p>
                    <p><a class="btn btn-custom" href="https://app.tridego.com/">Узнать больше</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="image/cartina.jpg" class="card-img-top" alt="Картина 3">
                <div class="card-body">
                    <h2 class="card-title">Фотография</h2>
                    <p class="description-text">Погрузитесь в искусство фотографии, которое захватывает момент и раскрывает неожиданные аспекты нашей жизни и природы.</p>
                    <p><a class="btn btn-custom" href="https://app.tridego.com/">Узнать больше</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Убедитесь, что кнопка всегда видна */
    .btn-custom {
        visibility: visible !important; /* Сделать кнопку всегда видимой */
        opacity: 1; /* Обеспечить видимость кнопки */
        transition: opacity 0.3s ease; /* Плавный переход для кнопки */
        color: black;
    }

    /* Убираем скрытие кнопки на hover */
    .card:hover .btn-custom {
        opacity: 1 !important; /* Обеспечить видимость на hover */
    }

    .card {
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex-grow: 1;
    }

    .card h2 {
        font-size: 1.5rem;
    }

    .card-img-top {
        object-fit: cover;
        height: 200px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

</script>
</body>
</html>
