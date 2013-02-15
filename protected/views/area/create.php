<?php
$this->pageCaption='Create Area';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo area';
$this->breadcrumbs=array(
	'Area'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Area', 'url'=>array('index')),
	array('label'=>'Administrar Area', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>