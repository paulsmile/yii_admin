<?php
/* @var $this BackendLoginFormController */
/* @var $model BackendLoginForm */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/admin/login.css');

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'backend-login-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,

)); ?>

<div id="login">
    <h2>网站登录</h2>

    <div class="wrap">
        <?php echo $form->textFieldRow($model,'username',array('class'=>'span3')); ?>
        <?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3')); ?>
        <div class="verifyCode">
            <?php $this->widget('CCaptcha'); ?>
        </div>
        <?php echo $form->passwordFieldRow($model,'verifyCode'); ?>
    </div>

    <div class="login_button">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'登录',
		)); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
