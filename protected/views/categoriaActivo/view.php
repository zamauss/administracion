<?php
$this->pageCaption='Ver CategoriaActivo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Categoria Activo'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Categoria Activo', 'url'=>array('index')),
	array('label'=>'Crear CategoriaActivo', 'url'=>array('create')),
	array('label'=>'Actualizar CategoriaActivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar CategoriaActivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Categoria Activo', 'url'=>array('admin')),
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
		array(	'name'=>'tipoActivo_did',
		        'value'=>$model->tipoActivo->nombre,),
	),
)); ?>
