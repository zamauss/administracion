<?php
$this->pageCaption='Ver EstrategiaObjetivogeneral #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estrategia Objetivogeneral'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Estrategia Objetivogeneral', 'url'=>array('index')),
	array('label'=>'Crear EstrategiaObjetivogeneral', 'url'=>array('create')),
	array('label'=>'Actualizar EstrategiaObjetivogeneral', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar EstrategiaObjetivogeneral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Estrategia Objetivogeneral', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'estrategia_did',
		        'value'=>$model->estrategia->nombre,),
		array(	'name'=>'objetivoGeneral_did',
		        'value'=>$model->objetivoGeneral->nombre,),
	),
)); ?>
