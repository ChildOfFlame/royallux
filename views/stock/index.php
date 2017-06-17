<?php

use app\helpers\DataRepresentation;
use app\rbac\Perms;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $provider ActiveDataProvider */

$user = Yii::$app->user;
?>

<?= GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        [
            'class' => SerialColumn::className(),
        ],
        'name',
        'price',
        'count',
        'type',
        [
            'class' => ActionColumn::className(),
            'template' => "{update} {delete}",
            'buttons' => [
                'update' => function($url, $model, $key) use ($user) {
                    if ($user->can(Perms::UPDATE_STOCK)) {
                        $options = [
                            'title' => Yii::t('yii', 'Изменить'),
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    }
                },
                'delete' => function($url, $model, $key) use ($user) {
                    if ($user->can(Perms::DELETE_STOCK)) {
                        $options = [
                            'title' => Yii::t('yii', 'Удалить'),
                            'data' => [
                                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить эту запись?'),
                                'method' => 'post',
                            ]
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    }
                },
            ],
        ],
    ],
]) ?>


<!-- <?
$this->title = 'Главное меню';
?>
<div class="detail">
	<div class="detail_head">
		<a href="#." class="back_btn"></a>
		<div class="search">
			<input type="text" name="search" placeholder="Поиск...">
			<div class="search_btn">
				<input type="submit" name="search_btn" value="">
			</div>
		</div>
		<div class="title">Склад</div>
		<div class="person_lk"><a href="#.">Вася Васькович</a></div>
	</div>
	<table>
		<tr>
			<th></th>
			<th>Название</th>
			<th>Колличество</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td><input type="checkbox"></td>
			<td>Печеньки с земляничным вкусом</td>
			<td>646</td>
			<td>1.000</td>
		</tr>
		<tr>
			<td><input type="checkbox"></td>
			<td>Вафельки с шоколадной прослойкой и начинкой</td>
			<td>892</td>
			<td>2.600</td>
		</tr>
		<tr>
			<td><input type="checkbox"></td>
			<td>Мармеладки с жидкой начинкой со вкусом мяты</td>
			<td>742</td>
			<td>2.000</td>
		</tr>
	</table>
	<div class="control_block">
		<div class="all_check_btn">
			<button class="all btn"></button>
		</div>
		<div class="main_btn">
			<button class="btn edit_btn"></button>
			<button class="btn add_btn"></button>
			<button class="btn remove_btn"></button>
		</div>
		<div class="paginator"></div>
	</div>
</div>
 -->