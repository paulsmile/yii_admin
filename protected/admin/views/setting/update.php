<?php
/* @var $this SettingFormController */
/* @var $model SettingForm */
/* @var $form CActiveForm */

$this->menu=array(
    array('label'=>'修改','url'=>'javascript:;','active'=>true,'icon'=>'pencil','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'管理','url'=>array('main'),'icon'=>'th-list'),
);
?>
<h1>修改 公共配置</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


