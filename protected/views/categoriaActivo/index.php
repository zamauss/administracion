<?php
$this->pageCaption='Categoria Activo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar categoria activo';
$this->breadcrumbs=array(
	'Categoria Activo',
);

$this->menu=array(
	array('label'=>'Crear CategoriaActivo', 'url'=>array('create')),
	array('label'=>'Administrar CategoriaActivo', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
