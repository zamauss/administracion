<?php
$this->pageCaption='Manage Activo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar activo';
$this->breadcrumbs=array(
	'Activo'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Activo', 'url'=>array('index')),
	array('label'=>'Crear Activo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('activo-grid', {
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
	'id'=>'activo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'cantidad',
		array(	'name'=>'persona_aid',
		        'value'=>'$data->persona->nombre',
			    'filter'=>CHtml::listData(Persona::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'area_did',
		        'value'=>'$data->area->nombre',
			    'filter'=>CHtml::listData(Area::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'tipoActivo_did',
		        'value'=>'$data->tipoActivo->nombre',
			    'filter'=>CHtml::listData(TipoActivo::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'categoriaActivo_did',
		        'value'=>'$data->categoriaActivo->nombre',
			    'filter'=>CHtml::listData(CategoriaActivo::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'marca_did',
		        'value'=>'$data->marca->nombre',
			    'filter'=>CHtml::listData(Marca::model()->findAll(), 'id', 'nombre'),),
		'descripcion',
		/*
		array(	'name'=>'estadoActivo_did',
		        'value'=>'$data->estadoActivo->nombre',
			    'filter'=>CHtml::listData(EstadoActivo::model()->findAll(), 'id', 'nombre'),),		
		'numeroSerie',
		'fecha_f',
		'precio',
		'aceptado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
