<?php
$this->breadcrumbs=array(
	'后台菜单'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'查看','url'=>'javascript:;','icon'=>'eye-open','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'更新','url'=>array('update','id'=>$model->id),'icon'=>'pencil'),
	array('label'=>'删除','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'真的要删除这条数据?'),'icon'=>'trash'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>查看 后台菜单 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'name',
		'link',
		'alt',
	),
)); ?>