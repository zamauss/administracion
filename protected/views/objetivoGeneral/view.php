<?php
$this->pageCaption=$model->descripcion;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Objetivo General',
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>
<h3>Información del objetivo general</h3>
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
		'metaCuantitativa',
		'recursos',
		'valoracion',
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		array(	'name'=>'planeacion_did',
		        'value'=>$model->planeacion->nombre,),
		'indicador',
	),
)); 

$estrategiasObjetivogeneral = EstrategiaObjetivogeneral::model()->findAll('objetivoGeneral_did = ' . $model->id);
?>
<h3>Estrategias a la que hace referencia</h3>
<table class="table table-bordered">
	<thead class="thead">
		<tr>
			<td><strong>Número</strong></td>
			<td><strong>Estrategia</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($estrategiasObjetivogeneral as $estrategiaObjetivogeneral){ ?>
		<tr>
			<td><?php echo $estrategiaObjetivogeneral->estrategia->id;?></td>	
			<td><?php echo $estrategiaObjetivogeneral->estrategia->descripcion;?></td>	
		</tr>
	<?php } ?>
	</tbody>
</table>


