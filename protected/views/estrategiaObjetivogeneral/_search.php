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
		<?php echo $form->label($model,'estrategia_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estrategia_did,CHtml::listData(Estrategia::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'objetivoGeneral_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,objetivoGeneral_did,CHtml::listData(ObjetivoGeneral::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
