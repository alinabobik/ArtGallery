<?php

use app\models\Kurs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KursSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Картины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kurs-index">

    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую картину', ['create'], ['class' => 'btn btn-success create-button']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'grid-view custom-grid'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => '#'],
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            [
                'attribute' => 'img',
                'label' => 'Изображение',
                'format' => ['image', ['width' => '100']],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'name',
                'label' => 'Название',
            ],
            [
                'attribute' => 'body',
                'label' => 'Описание',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kurs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
        'layout' => '{summary}{pager}{items}{pager}',
        'summaryOptions' => ['class' => 'summary'],
        'pager' => [
            'options' => ['class' => 'pagination justify-content-center'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
        ],
    ]); ?>

</div>

<style>
    /* Общие стили */
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
        color: #343a40;
    }

    .kurs-index {
        padding: 20px;
        background-color: #f2f0fc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .page-title {
        color: #9a8638;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Стили для кнопки "Создать новый курс" */
    .create-button {
        background-color: #9a8638;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .create-button:hover {
        background-color: #9a8638;
    }

    /* Стили для GridView */
    .custom-grid {
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .custom-grid table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-grid th,
    .custom-grid td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .custom-grid th {
        background-color: #e9ecef;
        font-weight: bold;
    }

    /* Стили для пагинации */
    .pagination {
        margin-top: 20px;
    }

    .page-item.active .page-link {
        background-color: #9a8638;
        border-color: #9a8638;
        color: white;
    }

    .page-link {
        color: #9a8638;
    }

    .page-link:hover {
        color: #9a8638;
    }

    /* Стили для summary */
    .summary {
        text-align: left;
        padding: 10px;
        color: #6c757d;
    }
</style>