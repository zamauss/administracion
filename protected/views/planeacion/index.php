<?php
$this->pageCaption='Planeacion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar planeacion';
$this->breadcrumbs=array(
	'Planeacion',
);

$this->menu=array(
	array('label'=>'Crear Planeacion', 'url'=>array('create')),
	array('label'=>'Administrar Planeacion', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
