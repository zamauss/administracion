<?php
$this->pageCaption='Actualizar Estatus '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estatus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estatus', 'url'=>array('index')),
	array('label'=>'Crear Estatus', 'url'=>array('create')),
	array('label'=>'Ver Estatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Estatus', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>