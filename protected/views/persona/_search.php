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
		<?php echo $form->label($model,'nombre'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'direccion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>300)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'telefono'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'telefono',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'celular'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'celular',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'correo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'departamento_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,departamento_did,CHtml::listData(Departamento::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'usuario_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,usuario_did,CHtml::listData(Usuario::model()->findAll(), 'id', 'usuario')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
