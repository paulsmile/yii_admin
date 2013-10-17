<?php
$this->breadcrumbs=array(
	'后台用户',
);

$this->menu=array(
    array('label'=>'列出','url'=>'javascript:;','icon'=>'th-list','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>列出 后台用户</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

?>