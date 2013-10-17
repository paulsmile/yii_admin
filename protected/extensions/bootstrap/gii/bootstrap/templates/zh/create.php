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
	'新增',
);\n";
?>

$this->menu=array(
    array('label'=>'新增','url'=>'javascript:;','icon'=>'plus','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'列出','url'=>array('index'),'icon'=>'th-list'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>新增 <?php echo $modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
