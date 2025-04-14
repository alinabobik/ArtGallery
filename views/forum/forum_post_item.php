<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\web\View;

/* @var $model app\models\ForumPost */

$currentUserId = Yii::$app->user->id; // Получаем ID текущего пользователя
$isCurrentUser = $model->created_by == $currentUserId;

// Определяем класс для выравнивания сообщения
$alignmentClass = $isCurrentUser ? 'align-right' : 'align-left';
$messageClass = $isCurrentUser ? 'question' : 'answer';
?>

<div class="message-container <?= Html::encode($alignmentClass) ?>">
    <div class="message <?= Html::encode($messageClass) ?>">
        <p class="post-content"><?= HtmlPurifier::process(Html::encode($model->content)) ?></p>
        <span class="post-author"><?= Html::encode($model->createdBy->username) ?></span>
    </div>
</div>
