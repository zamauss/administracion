<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->class2name($this->modelClass);
echo "\$this->pageCaption='Create $this->modelClass';
\$this->pageTitle=Yii::app()->name . ' - ' . \$this->pageCaption;
\$this->pageDescription='Crear nuevo ".strtolower($this->modelClass)."';
\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Crear',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $label; ?>', 'url'=>array('index')),
	array('label'=>'Administrar <?php echo $label; ?>', 'url'=>array('admin')),
);
?>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
