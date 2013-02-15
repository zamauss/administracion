<?php
$this->pageCaption='Manage Postit';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar postit';
$this->breadcrumbs=array(
	'Postit'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Postit', 'url'=>array('index')),
	array('label'=>'Crear Postit', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('postit-grid', {
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
	'id'=>'postit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'tipoPostit_did',
		        'value'=>'$data->tipoPostit->nombre',
			    'filter'=>CHtml::listData(TipoPostit::model()->findAll(), 'id', 'nombre'),),
		'nombre',
		array(	'name'=>'personaRemitente_aid',
		        'value'=>'$data->personaRemitente->nombre',
			    'filter'=>CHtml::listData(PersonaRemitente::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'personaDestinatario_aid',
		        'value'=>'$data->personaDestinatario->nombre',
			    'filter'=>CHtml::listData(PersonaDestinatario::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		/*
		'fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
