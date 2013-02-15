<?php
	$persona = Persona::model()->find('usuario_did = ' . $model->id);
	$this->pageCaption=$persona->nombre;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='Mi perfil';
	$this->breadcrumbs=array(
		'Activos Asignados',
	);
	
	$this->menu=array(
		array('label'=>'Volver', 'url'=>array('site/index')),
	);
	
	
?>

<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
		
	<div class="well">
		<h3><?php echo 'Escriba la nueva contraseña para: ' . $model->usuario; ?> </h3>
	
	
		<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
			<?php echo $form->labelEx($model,'password'); ?>
			<div class="input">
				
				<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>150)); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		</div>
	
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
