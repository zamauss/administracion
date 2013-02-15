<?php
$this->pageCaption='Objetivo General';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar objetivo general';
$this->breadcrumbs=array(
	'Objetivo General',
);

$this->menu=array(
	array('label'=>'Crear ObjetivoGeneral', 'url'=>array('create')),
	array('label'=>'Administrar ObjetivoGeneral', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
