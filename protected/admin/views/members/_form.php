<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'members-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block"> <span class="required">*</span>是必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'myid',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'myidkey',array('class'=>'span5','maxlength'=>16)); ?>

	<?php echo $form->textFieldRow($model,'regip',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'regdate',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'lastloginip',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lastlogintime',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'secques',array('class'=>'span5','maxlength'=>8)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '新增' : '更新',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
