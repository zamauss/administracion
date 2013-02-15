<?php
$this->pageCaption='Postit';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar postit';
$this->breadcrumbs=array(
	'Postit',
);

$this->menu=array(
	array('label'=>'Crear Postit', 'url'=>array('create')),
	array('label'=>'Administrar Postit', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
