<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
?>
<?php Pjax::begin(["id"=>"search"]);?>
<?php $form=ActiveForm::begin([
	'action'=>['stock/index'],
	'method'=>'get',
	'options'=> [
		'class'=>'search',
		'data-pjax'=>true,
	],
	'fieldConfig'=>[
		'template'=>"{input}",
	]
]);?>
<?=$form->field($model, 'name')->textInput(["placeholder"=>"Поиск..."]);?>
<div class="search_btn">
<?=HTML::submitButton("<span class='glyphicon glyphicon-search'></span>",["name"=>"search_btn"]);?>
</div>
<?php ActiveForm::end();?>
<?php Pjax::end();?>