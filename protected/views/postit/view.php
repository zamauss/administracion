<?php
$this->pageCaption='Ver Postit #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Postit',
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);

?>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'tipoPostit_did',
		        'value'=>$model->tipoPostit->nombre,),
		'nombre',
		array(	'name'=>'personaRemitente_aid',
		        'value'=>$model->personaRemitente->nombre,),
		array(	'name'=>'personaDestinatario_aid',
		        'value'=>$model->personaDestinatario->nombre,),
		array(	'name'=>'estatus_did',
		        'value'=>$model->estatus->nombre,),
		'fecha',
	),
)); */?>

<div class="row">	
	<div class="span12">
		<div class="postit-grande" style="<?php echo $model->tipoPostit->estilo;?>">
			<div id="titulo" style="margin-top:30px; margin-left:260px;">
				<?php
					if($model->estatus_did == 1) 
						echo CHtml::link('<i class="icon-check"></i>',array('postit/cambiarestatus',
	                     'id'=> $model->id )) . '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp';
	                else
	                	echo CHtml::link('<i class="icon-remove"></i>',array('postit/cambiarestatus',
	                     'estatus'=>'1')) . '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp';
				
	                echo CHtml::link('<i class="icon-trash"></i>',array('postit/archivar',
	                     'id'=> $model->id)) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				?>
				<img src="<?php echo Yii::app()->request->baseUrl . '/images/chincheta.png';?>" style="width: 50px; heigth:50px; margin-top:-55px; margin-left:180px;" />
			</div>
			<div id="cuerpo" style="margin-top:40px;">
				<?php echo $model->nombre; ?>
			</div>
			<div id="pie">
				<span class="label label-inverse" style="max-height: 120px; font-size:8pt; margin-top:20px; margin-left:50px;">
					<?php echo $model->personaRemitente->nombre; ?>
				</span>
			</div>
		</div>
	</div>
</div>
