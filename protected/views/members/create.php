<?php
$this->breadcrumbs=array(
	'会员'=>array('index'),
	'新增',
);

$this->menu=array(
    array('label'=>'新增 会员','url'=>'javascript:;','icon'=>'plus','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出 会员','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'管理 会员','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>新增 会员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>