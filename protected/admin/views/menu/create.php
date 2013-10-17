<?php
$this->breadcrumbs=array(
	'后台菜单'=>array('index'),
	'新增',
);

$this->menu=array(
    array('label'=>'新增','url'=>'javascript:;','icon'=>'plus','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>新增 后台菜单</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>