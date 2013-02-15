<?php
$this->pageCaption='Ver EstadoActivo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estado Activo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Estado Activo', 'url'=>array('index')),
	array('label'=>'Crear EstadoActivo', 'url'=>array('create')),
	array('label'=>'Actualizar EstadoActivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar EstadoActivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Estado Activo', 'url'=>array('admin')),
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
