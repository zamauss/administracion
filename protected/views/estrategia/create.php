<?php
$this->pageCaption='Create Estrategia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo estrategia';
$this->breadcrumbs=array(
	'Estrategia'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Estrategia', 'url'=>array('index')),
	array('label'=>'Administrar Estrategia', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>