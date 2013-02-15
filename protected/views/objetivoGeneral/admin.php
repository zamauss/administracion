<?php
$this->pageCaption='Manage Objetivo General';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar objetivo general';
$this->breadcrumbs=array(
	'Objetivo General'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Objetivo General', 'url'=>array('index')),
	array('label'=>'Crear ObjetivoGeneral', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('objetivo-general-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'objetivo-general-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'numero',
		'fechaCumplimiento',
		array(	'name'=>'plazo_did',
		        'value'=>'$data->plazo->nombre',
			    'filter'=>CHtml::listData(Plazo::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'responsable_aid',
		        'value'=>'$data->responsable->nombre',
			    'filter'=>CHtml::listData(Responsable::model()->findAll(), 'id', 'nombre'),),
		'descripcion',
		/*
		array(	'name'=>'persona_aid',
		        'value'=>'$data->persona->nombre',
			    'filter'=>CHtml::listData(Persona::model()->findAll(), 'id', 'nombre'),),
		'metaCuantitativa',
		'recursos',
		'valoracion',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'planeacion_did',
		        'value'=>'$data->planeacion->nombre',
			    'filter'=>CHtml::listData(Planeacion::model()->findAll(), 'id', 'nombre'),),
		'indicador',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
