<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'estrategia-objetivogeneral-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'estrategia_did'); ?>">
		<?php echo $form->labelEx($model,'estrategia_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'estrategia_did',CHtml::listData(Estrategia::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estrategia_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'objetivoGeneral_did'); ?>">
		<?php echo $form->labelEx($model,'objetivoGeneral_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'objetivoGeneral_did',CHtml::listData(ObjetivoGeneral::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'objetivoGeneral_did'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
