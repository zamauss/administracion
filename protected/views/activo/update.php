<?php
$this->pageCaption='Actualizar Activo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Activo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Activo', 'url'=>array('index')),
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Ver Activo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>