<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'backend-user-form',
    'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"> <span class="required">*</span>是必填项</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>100)); ?>

<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32,'value'=>'')); ?>

<?php echo $form->passwordFieldRow($model,'confirmPwd',array('class'=>'span5','maxlength'=>32)); ?>

<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>200)); ?>

<?php echo $form->textFieldRow($model,'true_name',array('class'=>'span5','maxlength'=>20)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>$model->isNewRecord ? '新增' : '更新',
    )); ?>
</div>

<?php $this->endWidget(); ?>
