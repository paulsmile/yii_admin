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
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=empty($_POST['CrudCode']['tab_name']) ? $this->pluralize($this->class2name($modelClass)):$modelClass;
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
    array('label'=>'查看','url'=>'javascript:;','icon'=>'eye-open','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'更新','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'icon'=>'pencil'),
	array('label'=>'删除','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'真的要删除这条数据?'),'icon'=>'trash'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>查看 <?php echo $modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>