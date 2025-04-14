<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<h1>Активные аукционы</h1>

<div class="row">
    <?php foreach ($auctions as $auction): ?>
        <div class="col-md-4">
            <div class="card">
                <?= Html::img($auction->proposal->image, ['class' => 'card-img-top']) ?>
                <div class="card-body">
                    <h5><?= Html::encode($auction->proposal->name) ?></h5>
                    <p>Текущая цена: <?= $auction->current_bid ?> ₽</p>
                    <a href="<?= Url::to(['view', 'id' => $auction->id]) ?>" class="btn btn-primary">Участвовать</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>