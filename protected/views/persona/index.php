<?php
$this->pageCaption='Persona';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar persona';
$this->breadcrumbs=array(
	'Persona',
);

$this->menu=array(
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
