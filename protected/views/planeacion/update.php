<?php
$this->pageCaption='Actualizar Planeacion '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Planeacion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Planeacion', 'url'=>array('index')),
	array('label'=>'Crear Planeacion', 'url'=>array('create')),
	array('label'=>'Ver Planeacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Planeacion', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>