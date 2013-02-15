<?php
$this->pageCaption='Tipo Usuario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar tipo usuario';
$this->breadcrumbs=array(
	'Tipo Usuario',
);

$this->menu=array(
	array('label'=>'Crear TipoUsuario', 'url'=>array('create')),
	array('label'=>'Administrar TipoUsuario', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
