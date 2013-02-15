<?php
$this->pageCaption='Create EstadoActivo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo estadoactivo';
$this->breadcrumbs=array(
	'Estado Activo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estado Activo', 'url'=>array('index')),
	array('label'=>'Administrar Estado Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>