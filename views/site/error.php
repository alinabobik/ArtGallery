<!-- /views/site/error.php -->
<?php
/* @var $this yii\web\View */
/* @var $message string */
/* @var $name string */

use yii\helpers\Html;

?>
<div class="site-error">
    <h1><?= Html::encode($message) ?></h1>
    <p><?= nl2br(Html::encode($name)) ?></p>
</div>
