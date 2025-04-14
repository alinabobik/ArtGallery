<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $topic app\models\ForumTopic */
/* @var $post app\models\ForumPost */

$this->title = Html::encode($topic->title);
$this->params['breadcrumbs'][] = ['label' => 'Форум', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss(<<<CSS
/* Основной контейнер форума */
.forum-view {
    background: #f2f4ff; /* Светлый фон в оттенках синего */
    padding: 40px;
    border-radius: 10px;
    max-width: 950px;
    margin: 50px auto;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    text-align: left;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.forum-view:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

/* Заголовок форума */
.forum-view h1 {
    color: #2f3b73; /* Тёмный синий для заголовка */
    margin-bottom: 30px;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: 0.5px;
    animation: fadeInTop 1s ease-out;
}

/* Стиль для текста о создателе темы */
.forum-view p {
    margin-bottom: 20px;
    color: #6b7b8c; /* Цвет для текста о создателе */
    font-size: 16px;
}

/* Стиль для сообщений */
.message-container {
    margin-bottom: 20px;
    overflow: hidden;
    animation: fadeInMessage 1s ease-in-out;
}

.message {
    padding: 18px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    word-wrap: break-word;
    max-width: 85%;
    position: relative;
    margin-bottom: 15px;
}

/* Цвета сообщений */
.question {
    background-color: #e1e8f0; /* Светлый синий для вопросов */
    text-align: right;
    float: right;
    clear: both;
    border-left: 5px solid #9da9e9; /* Подчеркиваем вопросы */
}

.answer {
    background-color: #ffffff; /* Белый для ответов */
    text-align: left;
    float: left;
    clear: both;
    border-left: 5px solid #9da9e9; /* Подчеркиваем ответы */
}

/* Автор сообщения */
.post-author {
    font-size: 0.75em;
    color: #9da9e9; /* Легкий синий для автора */
    position: absolute;
    bottom: 8px;
    right: 8px;
}

/* Стиль для формы добавления сообщения */
.form-group {
    margin-top: 20px;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #c7d1e1;
    padding: 16px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background-color: #ffffff;
}

.form-control:focus {
    outline: none;
    border-color: #9da9e9; /* Подсветка поля ввода */
    box-shadow: 0 0 0 0.2rem rgba(157, 169, 233, 0.25);
}

/* Кнопка отправки */
.btn-success {
    background-color: #9da9e9; /* Светлый синий цвет кнопки */
    border-color: #9da9e9;
    color: white;
    font-size: 16px;
    font-weight: 600;
    padding: 12px 24px;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    animation: scaleIn 0.6s ease-out;
}

.btn-success:hover {
    background-color: #7b8ca1; /* Темный синий при наведении */
    border-color: #7b8ca1;
    transform: scale(1.05);
}

/* Анимации */
@keyframes fadeInTop {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInMessage {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes scaleIn {
    0% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
    }
}

/* Стили для ссылок */
a {
    color: #6a7a9c; /* Серо-синий цвет для ссылок */
    text-decoration: underline;
}

a:hover {
    color: #2f3b73; /* Темный синий при наведении */
}

/* Классы для выравнивания сообщений */
.align-right {
    text-align: right;
}

.align-left {
    text-align: left;
}
CSS
);
?>

<div class="forum-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Автор: <?= Html::encode($topic->createdBy->username) ?><br>
        Дата создания: <?= Yii::$app->formatter->asDatetime($topic->created_at) ?>
    </p>

    <h3>Сообщения:</h3>

    <?= ListView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $topic->getPosts(),
            'pagination' => false,
        ]),
        'itemView' => 'forum_post_item', // Используем отдельный шаблон для элемента списка
        'options' => ['class' => 'messages-list'], // Добавляем класс для списка сообщений
        'itemOptions' => ['class' => 'message-container'], // Добавляем класс для контейнера сообщения
    ]) ?>

    <hr>

    <h3>Добавить сообщение</h3>

    <?php $form = ActiveForm::begin(['action' => ['create-post']]); ?>

    <?= $form->field($post, 'topic_id')->hiddenInput(['value' => $topic->id])->label(false) ?>
    <?= $form->field($post, 'content')->textarea(['rows' => 6, 'class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
