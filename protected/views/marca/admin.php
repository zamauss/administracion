<?php
$this->pageCaption='Manage Marca';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar marca';
$this->breadcrumbs=array(
	'Marca'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Marca', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('marca-grid', {
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
	'id'=>'marca-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		'nombre',
		array(	'name'=>'categoriaActivo_did',
		        'value'=>'$data->categoriaActivo->nombre',
			    'filter'=>CHtml::listData(CategoriaActivo::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
