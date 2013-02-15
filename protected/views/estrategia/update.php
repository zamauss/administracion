<?php
$this->pageCaption='Actualizar Estrategia '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estrategia'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estrategia', 'url'=>array('index')),
	array('label'=>'Crear Estrategia', 'url'=>array('create')),
	array('label'=>'Ver Estrategia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Estrategia', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>