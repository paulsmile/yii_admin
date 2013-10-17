<?php
/* @var $this BackendLoginFormController */
/* @var $model BackendLoginForm */
/* @var $form CActiveForm */

$this->menu=array(
    array('label'=>'新增','url'=>'javascript:;','active'=>true,'icon'=>'plus','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'管理','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'backend-login-form-form',
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"> <span class="required">*</span>是必填项</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'username',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'password',array('class'=>'span5')); ?>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'提交',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
