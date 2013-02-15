<?php
$this->pageTitle=Yii::app()->name . ' - Ops';
$this->pageCaption = 'Ops';
$this->pageDescription = 'No se encuentra la página solicitada ' . $code;
$this->breadcrumbs=array(
	'Ops',
);
?>

<?php $this->widget('BAlert',array(
	'content'=>CHtml::encode($message),
	'type'=>'error',
	'isBlock'=>true,
	'canClose'=>false,
)); ?>