<?php

use app\helpers\DataRepresentation;
use app\rbac\Perms;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $provider ActiveDataProvider */

?>
<div class="detail">
	<div class="detail_head">
		<?= HTML::a("<span class='glyphicon glyphicon-arrow-left'></span>",Url::to(['site/index']),["class"=>"back_btn"]);?>
        <?=$this->render('_search',["model"=>$searchModel]);?>
		<div class="title">Склад</div>
		<div class="person_lk"><?=HTML::a($user->identity->name ."<span class='glyphicon glyphicon-user'></span>",Url::to(["user/personal"]));?></div>
	</div>
    <?php Pjax::begin(["id"=>"table"]);?>
<?= GridView::widget([
    'dataProvider' => $provider,
    'layout'=>"{items}\n{pager}",
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
]);?>
<?php Pjax::end();?>
</div>