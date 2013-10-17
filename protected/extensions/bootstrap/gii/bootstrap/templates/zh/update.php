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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
    array('label'=>'更新','url'=>'javascript:;','active'=>true,'icon'=>'pencil','linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'查看','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'icon'=>'eye-open'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog','icon'=>'cog'),
);
?>

<h1>更新 <?php echo $modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>