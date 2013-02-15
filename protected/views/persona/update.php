<?php
$this->pageCaption='Actualizar Persona '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Persona'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Persona', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Ver Persona', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>