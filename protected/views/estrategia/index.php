<?php
$this->pageCaption='Estrategias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='de la Universidad San Sebastián';
$this->breadcrumbs=array(
	'Estrategia',
);
/*
$this->menu=array(
	array('label'=>'Crear Estrategia', 'url'=>array('create')),
	array('label'=>'Administrar Estrategia', 'url'=>array('admin')),
);
*/
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
