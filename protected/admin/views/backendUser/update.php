<?php
$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('label'=>'更新','url'=>'javascript:;','active'=>true,'icon'=>'pencil','linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'查看','url'=>array('view','id'=>$model->id),'icon'=>'eye-open'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog','icon'=>'cog'),
);
?>

<h1>更新 后台用户 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>