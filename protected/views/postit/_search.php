<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tipoPostit_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,tipoPostit_did,CHtml::listData(TipoPostit::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'nombre',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'personaRemitente_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'personaRemitente_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('personaRemitente/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'personaRemitente', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'personaDestinatario_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'personaDestinatario_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('personaDestinatario/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'personaDestinatario', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estatus_did,CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'fecha'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fecha'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
