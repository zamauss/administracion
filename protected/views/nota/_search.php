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
		<?php echo $form->label($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'fecha'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'fecha'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'objetivo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,objetivo_did,CHtml::listData(Objetivo::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
