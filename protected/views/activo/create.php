<?php
$this->pageCaption='Asignar Activo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo activo';
$this->breadcrumbs=array(
	'Activo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Activo', 'url'=>array('index')),
	array('label'=>'Administrar Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>