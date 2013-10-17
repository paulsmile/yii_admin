<?php
$this->breadcrumbs=array(
	'会员'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
    array('label'=>'更新','url'=>'javascript:;','active'=>true,'icon'=>'pencil','linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'查看','url'=>array('view','id'=>$model->uid),'icon'=>'eye-open'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog','icon'=>'cog'),
);
?>

<h1>更新 会员 <?php echo $model->uid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>