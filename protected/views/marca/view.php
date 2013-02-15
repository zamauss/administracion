<?php
$this->pageCaption='Ver Marca #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Marca'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Marca', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Actualizar Marca', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Marca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Marca', 'url'=>array('admin')),
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
		array(	'name'=>'categoriaActivo_did',
		        'value'=>$model->categoriaActivo->nombre,),
	),
)); ?>
