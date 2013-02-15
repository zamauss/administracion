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
		<?php echo $form->label($model,'persona_aid'); ?>
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
					 )); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'area_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,area_did,CHtml::listData(Area::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'tipoActivo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,tipoActivo_did,CHtml::listData(TipoActivo::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'categoriaActivo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,categoriaActivo_did,CHtml::listData(CategoriaActivo::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'marca_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,marca_did,CHtml::listData(Marca::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estadoActivo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,estadoActivo_did,CHtml::listData(EstadoActivo::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>200)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'numeroSerie'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'numeroSerie',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'fecha_f'); ?>
		<div class="input">
			
			<?php
					if ($fecha_f!='') 
						$fecha_f=date('d-m-Y',strtotime($fecha_f));
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fecha_f',
					                                       'value'=>$fecha_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$fecha_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'precio'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'precio'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'aceptado'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'aceptado'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
