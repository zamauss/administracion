<?php
$this->pageCaption='Ver TipoActivo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tipo Activo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tipo Activo', 'url'=>array('index')),
	array('label'=>'Crear TipoActivo', 'url'=>array('create')),
	array('label'=>'Actualizar TipoActivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar TipoActivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Tipo Activo', 'url'=>array('admin')),
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
