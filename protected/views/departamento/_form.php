<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'departamento-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'persona_aid'); ?>">
		<?php echo $form->labelEx($model,'persona_aid'); ?>
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
					 )); ?>			<?php echo $form->error($model,'persona_aid'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
