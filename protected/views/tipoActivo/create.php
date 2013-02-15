<?php
$this->pageCaption='Create TipoActivo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo tipoactivo';
$this->breadcrumbs=array(
	'Tipo Activo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo Activo', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>