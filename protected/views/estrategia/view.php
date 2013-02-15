<?php
$this->pageCaption='Ver Estrategia #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estrategia'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Estrategia', 'url'=>array('index')),
	array('label'=>'Crear Estrategia', 'url'=>array('create')),
	array('label'=>'Actualizar Estrategia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Estrategia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Estrategia', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'identificador',
		'descripcion',
	),
)); ?>
