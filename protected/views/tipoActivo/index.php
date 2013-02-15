<?php
$this->pageCaption='Tipo Activo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar tipo activo';
$this->breadcrumbs=array(
	'Tipo Activo',
);

$this->menu=array(
	array('label'=>'Crear TipoActivo', 'url'=>array('create')),
	array('label'=>'Administrar TipoActivo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
