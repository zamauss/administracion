<?php
$this->pageCaption='Ver Estatus #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estatus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Estatus', 'url'=>array('index')),
	array('label'=>'Crear Estatus', 'url'=>array('create')),
	array('label'=>'Actualizar Estatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Estatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Estatus', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
