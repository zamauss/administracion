<?php
$this->pageCaption='Ver Objetivo #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Objetivo',
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'numero',
		'fechaCumplimiento',
		array(	'name'=>'plazo_did',
		        'value'=>$model->plazo->nombre,),
		array(	'name'=>'responsable_aid',
		        'value'=>$model->responsable->nombre,),
		'descripcion',
		array(	'name'=>'persona_aid',
		        'value'=>$model->persona->nombre,),
        'indicador',
		'metaCuantitativa',
		'recursos',
		'valoracion',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),		
		'fechaCreacion',
		'fechaCumplida',
	),
)); ?>
