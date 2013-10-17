<?php
$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->id,
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

<h1>查看 后台用户 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'salt',
		'email',
		'true_name',
        array('name'=>'created', 'value'=>date(Tool::main('dateTime'),$model->created)),
        array('name'=>'updated', 'value'=>date(Tool::main('dateTime'),$model->updated)),
		'login_times',
		array('name'=>'login_time', 'value'=>date(Tool::main('dateTime'),$model->login_time)),
		array('name'=>'login_ip','value'=>Tool::number2ip($model->login_ip)),
	),
)); ?>