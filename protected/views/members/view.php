<?php
$this->breadcrumbs=array(
	'会员'=>array('index'),
	$model->uid,
);

$this->menu=array(
    array('label'=>'查看 会员','url'=>'javascript:;','icon'=>'eye-open','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出 会员','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增 会员','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'更新 会员','url'=>array('update','id'=>$model->uid),'icon'=>'pencil'),
	array('label'=>'删除 会员','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'真的要删除这条数据?'),'icon'=>'trash'),
	array('label'=>'管理 会员','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>查看 会员 #<?php echo $model->uid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'uid',
		'username',
		'password',
		'email',
		'myid',
		'myidkey',
		'regip',
		'regdate',
		'lastloginip',
		'lastlogintime',
		'salt',
		'secques',
	),
)); ?>