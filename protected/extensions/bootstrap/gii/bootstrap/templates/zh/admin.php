<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/**
 * @var $modelClass 模型名，操作对象，如果有post值，则用post值，如果没有则用默认的数据表名字
 */
$modelClass = !empty($_POST['CrudCode']['tab_name']) ? $_POST['CrudCode']['tab_name'] : $this->modelClass;
?>
<?php
echo "<?php\n";
$label=empty($_POST['CrudCode']['tab_name']) ? $this->pluralize($this->class2name($modelClass)):$modelClass;
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'管理',
);\n";
?>

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
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理 <?php echo $label; ?></h1>

<p>
   还可以输入比较运算符（??<，<=，>，>=，<>或=）开始您的搜索
</p>

<?php echo "<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button btn')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    //'ajaxUpdate'=> false,//这样就不会AJAX翻页，批量修改的时候，必须去掉ajax翻页
'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
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