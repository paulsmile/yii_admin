<?php
$this->menu=array(
    array('label'=>'管理','url'=>'javascript:;','active'=>true,'icon'=>'th-list','linkOptions'=>array('style'=>'cursor:default')),
    array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
);

$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'backend-user-grid',
    'dataProvider'=>$dataProvider,
    'filter'=>$filtersForm,
    //'ajaxUpdate'=> false,//这样就不会AJAX翻页，批量修改的时候，必须去掉ajax翻页
    'columns'=>array(
        array('name'=>'id','header'=>'key标识'),
        array('name'=>'name','header'=>'名称'),
        array('name'=>'value','header'=>'值','value'=>'Tool::truncate($data["value"],10)'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{myUpdate}{myView}{myDelete}',
            'header'=>'操作',
            'buttons'=>array(
                'myUpdate' => array(
                    'label'=>'修改',
                    'icon'=>'icon-pencil',
                    'url' =>'Yii::app()->createUrl("setting/update",array("id"=>$data["id"]))',
                    'visible'=>'$data["readOnly"]==0 ? true : false',
                ),
                'myView' => array(
                    'label'=>'查看',
                    'icon'=>'icon-eye-open',
                    'url' =>'Yii::app()->createUrl("setting/view",array("id"=>$data["id"]))',
                ),
                'myDelete' => array(
                    'label'=>'删除',
                    'icon'=>'icon-trash',
                    'url' =>'Yii::app()->createUrl("setting/delete",array("id"=>$data["id"]))',
                    'visible'=>'$data["readOnly"]==0 ? true : false',
                    'options'=>array('onclick'=>'return confirm("真的要删除这条数据？")'),
                ),
            ),
        ),
    ),
));

