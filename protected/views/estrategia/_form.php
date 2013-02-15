<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'estrategia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'identificador'); ?>">
		<?php echo $form->labelEx($model,'identificador'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'identificador',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'identificador'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'descripcion'); ?>">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
