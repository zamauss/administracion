<?php
$this->pageCaption='Tipo Postit';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar tipo postit';
$this->breadcrumbs=array(
	'Tipo Postit',
);

$this->menu=array(
	array('label'=>'Crear TipoPostit', 'url'=>array('create')),
	array('label'=>'Administrar TipoPostit', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
