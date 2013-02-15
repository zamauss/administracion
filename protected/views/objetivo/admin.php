<?php
$this->pageCaption='Administrar Objetivos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Objetivo',
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Objetivo', 'url'=>array('index')),
	array('label'=>'Crear Objetivo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('objetivo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'objetivo-grid',
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
		        'value'=>'$data->persona->nombre',
			    'filter'=>CHtml::listData(Persona::model()->findAll(), 'id', 'nombre'),),
		'descripcion',
		
		array(	'name'=>'persona_aid',
		        'value'=>'$data->persona->nombre',
			    'filter'=>CHtml::listData(Persona::model()->findAll(), 'id', 'nombre'),),
		'indicador',
		'metaCuantitativa',
		'recursos',
		'valoracion',
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
