<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'activo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'persona_aid'); ?>">
		<?php echo $form->labelEx($model,'persona_aid'); ?>
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
					 )); ?>			<?php echo $form->error($model,'persona_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'area_did'); ?>">
		<?php echo $form->labelEx($model,'area_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'area_did',CHtml::listData(Area::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'area_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'tipoActivo_did'); ?>">
		<?php echo $form->labelEx($model,'tipoActivo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'tipoActivo_did',CHtml::listData(TipoActivo::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'tipoActivo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'categoriaActivo_did'); ?>">
		<?php echo $form->labelEx($model,'categoriaActivo_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'categoriaActivo_did',CHtml::listData(CategoriaActivo::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'categoriaActivo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'marca_did'); ?>">
		<?php echo $form->labelEx($model,'marca_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,'marca_did',CHtml::listData(Marca::model()->findAll(), 'id', 'nombre')); ?>			
			<?php echo $form->error($model,'marca_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estadoActivo_did'); ?>">
		<?php echo $form->labelEx($model,'estadoActivo_did'); ?>
		<div class="input">			
			<?php echo $form->dropDownList($model,'estadoActivo_did',CHtml::listData(EstadoActivo::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'estadoActivo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'descripcion'); ?>">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'numeroSerie'); ?>">
		<?php echo $form->labelEx($model,'numeroSerie'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'numeroSerie',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'numeroSerie'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'fecha_f'); ?>">
		<?php echo $form->labelEx($model,'fecha_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fecha_f!='') 
						$model->fecha_f=date('d-m-Y',strtotime($model->fecha_f));
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fecha_f',
					                                       'value'=>$model->fecha_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$model->fecha_f,
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
					                                       ),)); ?>			<?php echo $form->error($model,'fecha_f'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'precio'); ?>">
		<?php echo $form->labelEx($model,'precio'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'precio'); ?>
			<?php echo $form->error($model,'precio'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'aceptado'); ?>">
		<?php echo $form->labelEx($model,'aceptado'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'aceptado'); ?>
			<?php echo $form->error($model,'aceptado'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
