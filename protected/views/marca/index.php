<?php
$this->pageCaption='Marca';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar marca';
$this->breadcrumbs=array(
	'Marca',
);

$this->menu=array(
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Administrar Marca', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
