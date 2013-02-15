<?php
$this->pageCaption='Activo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar activo';
$this->breadcrumbs=array(
	'Activo',
);

$this->menu=array(
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Administrar Activo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
