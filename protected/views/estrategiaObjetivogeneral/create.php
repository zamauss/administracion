<?php
$this->pageCaption='Create EstrategiaObjetivogeneral';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo estrategiaobjetivogeneral';
$this->breadcrumbs=array(
	'Estrategia Objetivogeneral'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estrategia Objetivogeneral', 'url'=>array('index')),
	array('label'=>'Administrar Estrategia Objetivogeneral', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>