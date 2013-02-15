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
		<?php echo $form->label($model,'usuario'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'usuario',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tipousuario_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,tipousuario_did,CHtml::listData(Tipousuario::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estatus_did,CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
