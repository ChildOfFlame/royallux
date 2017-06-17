<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Главное меню');
?>
<div class="main">
    <div class="menu-left">
        <div class="menu-item date">
            <div class="curent_date"><?=$arDate["day"]?></div>
            <div class="menu-title"><?=$arDate["month"]?></div>
        </div>
        <div class="menu-item orders">
            <img src="images/order.png" class="img-center">
            <?= Html::a(Yii::t('app', 'Заказы'), Url::to(['/site/login']), [
				'class' => 'menu-title',
			]) ?>
        </div>
    </div>
    <div class="menu-right">
        <div class="menu-item-center">
            <div class="menu-item user">
					<?= Html::a(Yii::t('app', 'Выход'), Url::to(['/user/logout']), [
						'class' => 'exit',
					]) ?>
                <img src="images/user.png" class="img-center">
                <div class="percent">
                	<img src="images/percent.png">
                	<p></p>
                </div>
                <div class="menu-title"><?= $user->name?></div>
            </div>
            <div class="menu-item reports">
                <img src="images/reports.png">
                <?= Html::a(Yii::t('app', 'Отчеты'), Url::to(['/site/login']), [
					'class' => 'menu-title',
			    ]) ?>
            </div>
            <div class="clear"></div>
            <div class="menu-item current_orders">
                <img src="images/current_order.png">
                <?= Html::a(Yii::t('app', 'Текущие заказы'), Url::to(['/site/login']), [
					'class' => 'menu-title',
			    ]) ?>
            </div>
        </div>
        <div class="menu-item sklad">
            <img src="images/sklad.png" class="img-center">
            <?= Html::a(Yii::t('app', 'Склад'), Url::to(['/stock/index']), [
				'class' => 'menu-title',
			]) ?>
        </div>
        <div class="clear"></div>
        <div class="menu-item manager">
            <img src="images/meneger.png">
            <?= Html::a(Yii::t('app', 'Менеджеры'), Url::to(['/site/login']), [
				'class' => 'menu-title',
			]) ?>
        </div>
        <div class="menu-item costs">
            <img src="images/zacupka.png">
            <?= Html::a(Yii::t('app', 'Закупка/прочие расходы'), Url::to(['/site/login']), [
				'class' => 'menu-title',
			]) ?>
        </div>
        <div class="clear"></div>
    </div>
</div>