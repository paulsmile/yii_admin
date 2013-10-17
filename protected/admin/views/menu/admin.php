<?php
$this->breadcrumbs=array(
	'后台菜单'=>array('index'),
	'管理',
);

$this->menu=array(
    array('label'=>'管理','url'=>'javascript:;','active'=>true,'icon'=>'cog','linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理 后台菜单</h1>

<p>
   还可以输入比较运算符（??<，<=，>，>=，<>或=）开始您的搜索
</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    //'ajaxUpdate'=> false,//这样就不会AJAX翻页，批量修改的时候，必须去掉ajax翻页
'columns'=>array(
		'id',
		array(
            'name'=>'parent_id',
            'value'=>'$data->parent_id==0 ? "顶部菜单" : Menu::model()->findByPk($data->parent_id)->name'
        ),
		'name',
		'link',
		'alt',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
));

/**
//常用自定义显示
array(
    'columns' => array(
        //锚点
        array('name' => 'name', 'type' => 'raw', 'value' => 'CHtml::link($data->name,"/book/$data->id")'),
        //图片
        array('name' => 'image', 'type' => 'image', 'value' => 'LImages::getPath("book").$data->image'),
        //下拉列表+回调函数. findOrderUrl 是action中的方法
        array(
            'name'=>'order_url',
            'value'=>array($this,'findOrderUrl'),
            'filter'=>CHtml::listData(OrderUrl::model()->findAll(),'order_url','title'),
        ),
        //时间
        array('name' => 'create_time', 'type' => 'datetime'),
        // 根据相关信息读数据库
        array('name' => 'user_id', 'value' => 'User::model()->findbyPk($data->user_id)->username', 'filter' => false),
    )
);
//自定义按钮
array
(
    'class'=>'CButtonColumn',
    'template'=>'{email}{down}{delete}',
    'buttons'=>array
    (
        'email' => array
        (
            'label'=>'Send an e-mail to this user',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
        ),
        'down' => array
        (
            'label'=>'[-]',
            'url'=>'"#"',
            'visible'=>'$data->score > 0',
            'click'=>'function(){alert("Going down!");}',
        ),
    ),
),
*/
?>