<?php
$this->pageCaption='Actualizar Objetivo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Objetivo',
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>