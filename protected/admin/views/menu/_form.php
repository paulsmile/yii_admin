<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block"> <span class="required">*</span>是必填项</p>

	<?php echo $form->errorSummary($model);
        $listData = CHtml::listData($model->getSelectMenu(),'id','name');
        $t = array_reverse($listData,true);
        $t[0] = '顶部菜单';
        $listData = array_reverse($t,true);
    ?>

	<?php echo $form->dropDownListRow($model,'parent_id', $listData,array('size'=>12));  ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'link',array('class'=>'span5','maxlength'=>200)); ?> site/index(控制器/动作)
       也可以是绝对地址 http://www.qq.com <br/>
      <i>模块地址必须完整例如(srbac/authitem/manage)</i>

	<?php echo $form->textFieldRow($model,'alt',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '新增' : '更新',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
