<?php
$this->pageCaption='Create Marca';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo marca';
$this->breadcrumbs=array(
	'Marca'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Marca', 'url'=>array('index')),
	array('label'=>'Administrar Marca', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>