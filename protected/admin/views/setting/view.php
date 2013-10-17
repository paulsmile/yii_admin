<?php
$this->menu=array(
    array('label'=>'查看','url'=>'javascript:;','active'=>true,'icon'=>'eye-open','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'管理','url'=>array('main'),'icon'=>'th-list'),
);
?>

<h1>查看 配置 #<?php echo $model->key; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        'key',
        'readOnly',
        'name',
        'value',
    ),
)); ?>