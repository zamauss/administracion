<?php
$this->pageCaption='Actualizar Nota '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Nota'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Nota', 'url'=>array('index')),
	array('label'=>'Crear Nota', 'url'=>array('create')),
	array('label'=>'Ver Nota', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Nota', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>