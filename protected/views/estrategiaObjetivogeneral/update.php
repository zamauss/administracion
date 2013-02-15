<?php
$this->pageCaption='Actualizar EstrategiaObjetivogeneral '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estrategia Objetivogeneral'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estrategia Objetivogeneral', 'url'=>array('index')),
	array('label'=>'Crear EstrategiaObjetivogeneral', 'url'=>array('create')),
	array('label'=>'Ver EstrategiaObjetivogeneral', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Estrategia Objetivogeneral', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>