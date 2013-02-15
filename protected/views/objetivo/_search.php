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
		<?php echo $form->label($model,'numero'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'numero',array('size'=>5,'maxlength'=>5)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'fechaCumplimiento'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fechaCumplimiento'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'plazo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,plazo_did,CHtml::listData(Plazo::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'responsable_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'responsable_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('persona/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'responsable', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>500)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'persona_aid'); ?>
		<div class="input">
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'persona_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('persona/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'persona', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'metaCuantitativa'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'metaCuantitativa',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'recursos'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'recursos',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'valoracion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'valoracion'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estatus_did,CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'objetivoGeneral_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,objetivoGeneral_did,CHtml::listData(ObjetivoGeneral::model()->findAll(), 'id', 'descripcion')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'indicador'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'indicador',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'fechaCreacion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fechaCreacion'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
