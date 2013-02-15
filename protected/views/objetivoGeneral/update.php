<?php
$this->pageCaption=$model->descripcion;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Objetivo General'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>