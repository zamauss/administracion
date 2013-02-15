<?php
$this->pageCaption='Objetivo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar objetivo';
$this->breadcrumbs=array(
	'Objetivo',
);

$this->menu=array(
	array('label'=>'Crear Objetivo', 'url'=>array('create')),
	array('label'=>'Administrar Objetivo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
