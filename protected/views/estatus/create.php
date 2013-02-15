<?php
$this->pageCaption='Create Estatus';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo estatus';
$this->breadcrumbs=array(
	'Estatus'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estatus', 'url'=>array('index')),
	array('label'=>'Administrar Estatus', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>