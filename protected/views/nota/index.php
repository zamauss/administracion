<?php
$this->pageCaption='Nota';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar nota';
$this->breadcrumbs=array(
	'Nota',
);

$this->menu=array(
	array('label'=>'Crear Nota', 'url'=>array('create')),
	array('label'=>'Administrar Nota', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
