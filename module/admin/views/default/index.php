<div class="admin-default-index">
    <p><a class="btn btn-custom" href="<?php echo \yii\helpers\Url::to(['/admin/kurs/']) ?>">Перейти</a></p>

</div>

<style>
    .admin-default-index {
        display: flex;
        flex-direction: column; /* Размещаем элементы вертикально */
        justify-content: flex-start; /* Выравнивание по верхнему краю */
        align-items: center; /* Горизонтальное центрирование */
        min-height: 100vh; /* Занимаем всю высоту экрана (минимум) */
        padding-top: 20px; /* Добавим немного места сверху */
    }

    .btn-custom {
        background-color: #737337;
        color: white;
        border-radius: 20px;
        padding: 15px 30px;
        font-size: 1.2em;
        border: none;
        cursor: pointer;
        margin-bottom: 20px; /* Добавим отступ под кнопкой */
    }

    .btn-custom:hover {
        background-color: #9a8638;
    }

    .flying-star {
        width: 100px; /* Задайте нужный размер для звезды */
        animation: fly 5s infinite alternate ease-in-out;
        /* margin-top: 20px;  Удаляем, т.к. flexbox контролирует отступ */
    }

    @keyframes fly {
        0% {
            transform: translateY(0) rotate(0deg); /* Только вертикальное перемещение */
        }
        50% {
            transform: translateY(-20px) rotate(10deg); /* Слегка вращаем */
        }
        100% {
            transform: translateY(0) rotate(-10deg); /* Вернемся к исходному положению */
        }
    }
</style>