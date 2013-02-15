<?php
$this->pageCaption='Area';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar area';
$this->breadcrumbs=array(
	'Area',
);

$this->menu=array(
	array('label'=>'Crear Area', 'url'=>array('create')),
	array('label'=>'Administrar Area', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
