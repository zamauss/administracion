<?php
$this->pageCaption='Manage Persona';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar persona';
$this->breadcrumbs=array(
	'Persona'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Persona', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('persona-grid', {
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
	'id'=>'persona-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'nombre',
		'direccion',
		'telefono',
		'celular',
		'correo',
		/*
		array(	'name'=>'departamento_did',
		        'value'=>'$data->departamento->nombre',
			    'filter'=>CHtml::listData(Departamento::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'usuario_did',
		        'value'=>'$data->usuario->nombre',
			    'filter'=>CHtml::listData(Usuario::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
