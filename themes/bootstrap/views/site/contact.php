<?php
$this->pageCaption='Contáctame y';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='envíame una retro.';
$this->breadcrumbs=array(
	'Contáctame',
);
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<?php $this->beginWidget('BAlert',array('type'=>'success')); ?>
<?php echo Yii::app()->user->getFlash('contact'); ?>
<?php $this->endWidget(); ?>

<?php else: ?>

<p>
Si tienes alguna pregunta, por favor llena el siguiente formulario. Gracias.
</p>

<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
//	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<?php $this->beginWidget('BAlert',array()); ?>
	<p>Campos con <span class="required">*</span> son requeridos.</p>
	<?php $this->endWidget(); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'name'); ?>">
		<?php echo $form->labelEx($model,'name'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'name'); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'subject'); ?>">
		<?php echo $form->labelEx($model,'subject'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'subject'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'body'); ?>">
		<?php echo $form->labelEx($model,'body'); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'body'); ?>
		</div>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="<?php echo $form->fieldClass($model, 'verifyCode'); ?>">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div class="controls">
			<?php $this->widget('CCaptcha'); ?><br/>
			<?php echo $form->textField($model,'verifyCode'); ?>
			<?php echo $form->error($model,'verifyCode'); ?>
			<p class="help-block">
				Por favor introduzca la letras que se muestran en la imagen de arriba.
				<br/>Las letras no distinguen entre mayúsculas y minúsculas.
			</p>
		</div>
	</div>
	<?php endif; ?>

	<div class="form-actions">
		<?php echo BHtml::submitButton('Enviar Sugerencia'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>