<?php
$this->pageCaption='Estado Activo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar estado activo';
$this->breadcrumbs=array(
	'Estado Activo',
);

$this->menu=array(
	array('label'=>'Crear EstadoActivo', 'url'=>array('create')),
	array('label'=>'Administrar EstadoActivo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
