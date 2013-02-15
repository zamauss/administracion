<?php
$this->pageCaption='Estrategia Objetivogeneral';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar estrategia objetivogeneral';
$this->breadcrumbs=array(
	'Estrategia Objetivogeneral',
);

$this->menu=array(
	array('label'=>'Crear EstrategiaObjetivogeneral', 'url'=>array('create')),
	array('label'=>'Administrar EstrategiaObjetivogeneral', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
