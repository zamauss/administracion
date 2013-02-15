<?php
$this->pageCaption='Manage Estrategia Objetivogeneral';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Administar estrategia objetivogeneral';
$this->breadcrumbs=array(
	'Estrategia Objetivogeneral'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Estrategia Objetivogeneral', 'url'=>array('index')),
	array('label'=>'Crear EstrategiaObjetivogeneral', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('estrategia-objetivogeneral-grid', {
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
	'id'=>'estrategia-objetivogeneral-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap-theme.widgets.assets')).'/gridview/styles.css',
	'itemsCssClass'=>'table  table-striped',
	'columns'=>array(
		'id',
		array(	'name'=>'estrategia_did',
		        'value'=>'$data->estrategia->nombre',
			    'filter'=>CHtml::listData(Estrategia::model()->findAll(), 'id', 'nombre'),),
		array(	'name'=>'objetivoGeneral_did',
		        'value'=>'$data->objetivoGeneral->nombre',
			    'filter'=>CHtml::listData(ObjetivoGeneral::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
