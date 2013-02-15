<?php
$this->pageCaption='Ver Activo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Activo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Activo', 'url'=>array('index')),
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Actualizar Activo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Activo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Activo', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'persona_aid',
		        'value'=>$model->persona->nombre,),
		array(	'name'=>'area_did',
		        'value'=>$model->area->nombre,),
		'cantidad',
		array(	'name'=>'tipoActivo_did',
		        'value'=>$model->tipoActivo->nombre,),
		array(	'name'=>'categoriaActivo_did',
		        'value'=>$model->categoriaActivo->nombre,),
		array(	'name'=>'marca_did',
		        'value'=>$model->marca->nombre,),
		array(	'name'=>'estadoActivo_did',
		        'value'=>$model->estadoActivo->nombre,),
		'descripcion',
		'numeroSerie',
		'fecha_f',
		'precio',
		'aceptado',
	),
)); ?>
