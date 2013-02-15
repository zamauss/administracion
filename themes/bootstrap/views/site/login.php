<?php
$this->pageCaption='';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
?>

<div class="form">
<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="well" style="width:250px; height:250px; position:relative; margin-left: auto; margin-right: auto;">
		<h2>Iniciar Sesión</h2>
		<br/>
		<div class="<?php echo $form->fieldClass($model, 'username'); ?>" style="position:relative; margin-left: auto; margin-right: auto;">		
			
				<?php echo $form->textField($model,'username',array('placeholder'=>'Usuario', 'style'=>'width:100%; box-sizing:border-box; display:block; min-height:30px; font-size:16px; height:auto; margin-bottom:0px; padding:7px 9px;')); ?>
				<?php echo $form->error($model,'username'); ?>
			
		</div>
	
		<div class="<?php echo $form->fieldClass($model, 'password'); ?>" style="position:relative; margin-left: auto; margin-right: auto;">
			
				<?php echo $form->passwordField($model,'password',array('placeholder'=>'Contraseña', 'style'=>'width:100%; box-sizing:border-box; display:block; min-height:30px; font-size:16px; height:auto; margin-bottom:0px; padding:7px 9px;')); ?>
				<?php echo $form->error($model,'password'); ?>			
			
		</div>
	
		<div class="<?php echo $form->fieldClass($model, 'rememberMe'); ?>">
			
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			
		</div>
		
		<?php echo BHtml::submitButton('Iniciar Sesión',array('class'=>'btn btn-success btn-large')); ?>
	
	</div>

	

<?php $this->endWidget(); ?>
</div><!-- form -->
