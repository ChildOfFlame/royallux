<?php
    
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->title="Авторизация";?>
<div class="overlay">
    <div class="authrization-form">
        <h2><?=Html::encode($this->title)?></h2>
        <?php Pjax::begin(['id'=>"load"]);?>
        <?php $form = ActiveForm::begin([
            'id'                     => "auth-form",
            'options'                =>["data-pjax"=>true],
            'fieldConfig'            =>[
                'template' =>"<div class='input-group'>{label}{input}</div>"
            ]
        ]);?>
        <?= $form->errorSummary($model,["header"=>''])?>
                <?=$form->field($model,'login')->textInput()->label("Логин:",["class"=>"center"])?>
                
                <?=$form->field($model,"password")->passwordInput()->label("Пароль:")?>
               
               	<?=$form->field($model, 'rememberMe')
            		->checkbox([
		                'label' => '<span class="name-checkbox">Запомнить</span>',
		                'labelOptions' => [
		                    'class' => 'label-checkbox'
		                ],
		                'class' => "hidden"
		            ]);?>
            <?=HTML::submitButton("Войти",["class"=>"submitBtn"])?>
            <div class="clear"></div>
        <?php ActiveForm::end();?>
        <?php Pjax::end();?>
    </div>
    <div id="preloader">
        <div class="ball-spin-fade-loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
