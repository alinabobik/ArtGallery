<?php

use yii\helpers\Html;

/* @var $model app\models\ForumTopic */
?>

<div class="forum-topic">
    <h4><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?></h4>
    <p>
        Автор: <?= Html::encode($model->createdBy->username) ?><br>
        Дата создания: <?= Yii::$app->formatter->asDatetime($model->created_at) ?>
    </p>
</div>
