<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\web\View;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        <?= Yii::t('app', 'Данная ошибка произошла во время выполнения сервером вашего запроса.') ?>
    </p>
    <p>
        <?= Yii::t('app', 'Пожалуйста свяжитесь с нами если Вы считаете что это ошибка сервера. Спасибо.') ?>
    </p>

</div>
