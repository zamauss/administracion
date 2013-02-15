<?php
$this->pageCaption='Ver Planeacion #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Planeacion'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Planeacion', 'url'=>array('index')),
	array('label'=>'Crear Planeacion', 'url'=>array('create')),
	array('label'=>'Actualizar Planeacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Planeacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Planeacion', 'url'=>array('admin')),
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
		'anio',
		'descripcion',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		array(	'name'=>'persona_aid',
		        'value'=>$model->persona->nombre,),
	),
)); ?>
