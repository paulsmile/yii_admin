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
	'$label',
);\n";
?>

$this->menu=array(
    array('label'=>'列出','url'=>'javascript:;','icon'=>'th-list','active'=>true,'linkOptions'=>array('style'=>'cursor:default')),
	array('label'=>'新增','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'管理','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>列出 <?php echo $label; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

?>