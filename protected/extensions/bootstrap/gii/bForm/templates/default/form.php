<?php
/**
 * This is the template for generating a form script file.
 * The following variables are available in this template:
 * - $this: the FormCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getModelClass(); ?>Controller */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */

$this->menu=array(
    array('label'=>'新增','url'=>'javascript:;','active'=>true,'icon'=>'plus','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'管理','url'=>array('admin'),'icon'=>'th-list'),
);
?>

<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

    <p class="help-block"> <span class="required">*</span>是必填项</p>

<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->getModelAttributes() as $column){
    echo "<?php echo ".$this->generateActiveRow($column)."; ?>\n";
}
?>
    <div class="form-actions">
        <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'提交',
		)); ?>\n"; ?>
    </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>