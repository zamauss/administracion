<?php
$this->pageCaption='Departamento';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar departamento';
$this->breadcrumbs=array(
	'Departamento',
);

$this->menu=array(
	array('label'=>'Crear Departamento', 'url'=>array('create')),
	array('label'=>'Administrar Departamento', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
