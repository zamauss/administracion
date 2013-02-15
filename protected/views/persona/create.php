<?php
$this->pageCaption='Create Persona';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo persona';
$this->breadcrumbs=array(
	'Persona'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Persona', 'url'=>array('index')),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>