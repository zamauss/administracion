<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'objetivo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'numero'); ?>">
		<?php echo $form->labelEx($model,'numero'); ?>
		<div class="input-prepend">
			<span class="add-on">Texto</span>	
			
			<?php echo $form->textField($model,'numero',array('size'=>5,'maxlength'=>5)); ?>
			<?php echo $form->error($model,'numero'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'fechaCumplimiento'); ?>">
		<?php echo $form->labelEx($model,'fechaCumplimiento'); ?>
		<div class="input-prepend">
			<span class="add-on">Fecha</span>
			
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'model'=>$model,
					'attribute'=>'fechaCumplimiento',
					'language'=>'es',
					'options'=> array(
						'dateFormat'=>'yy-mm-dd', 
						'altFormat'=>'dd-mm-yy', 
						'changeMonth'=>'true', 
						'changeYear'=>'true', 
						'yearRange'=>'2010:2012', 
						'showOn'=>'both',
						'buttonText'=>'<i class="icon-calendar"></i>'
					),
				));			
			?>	
			<?php echo $form->error($model,'fechaCumplimiento'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'plazo_did'); ?>">
		<?php echo $form->labelEx($model,'plazo_did'); ?>
		<div class="input-prepend">
			<span class="add-on">Selec</span>	
			
			<?php echo $form->dropDownList($model,'plazo_did',CHtml::listData(Plazo::model()->findAll(), 'id', 'nombre')); ?>			<?php echo $form->error($model,'plazo_did'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'descripcion'); ?>">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="input-prepend">
			<span class="add-on">Texto</span>	
			
			<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>500)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

	
	<div class="<?php echo $form->fieldClass($model, 'responsable_aid'); ?>">
		<?php echo $form->labelEx($model,'responsable_aid'); ?>
		<div class="input-prepend">
			<span class="add-on">Buscar</span>	
			
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>$model, 
					      'attribute'=>'responsable_aid', 
					      'sourceUrl'=>Yii::app()->createUrl('persona/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'persona', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>			<?php echo $form->error($model,'responsable_aid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'indicador'); ?>">
		<?php echo $form->labelEx($model,'indicador'); ?>
		<div class="input-prepend">
			<span class="add-on">Texto</span>
			
			<?php echo $form->textField($model,'indicador',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'indicador'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'metaCuantitativa'); ?>">
		<?php echo $form->labelEx($model,'metaCuantitativa'); ?>
		<div class="input-prepend">
			<span class="add-on">Texto</span>
			
			<?php echo $form->textField($model,'metaCuantitativa',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'metaCuantitativa'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'recursos'); ?>">
		<?php echo $form->labelEx($model,'recursos'); ?>
		<div class="input-prepend">
			<span class="add-on">Texto</span>
			
			<?php echo $form->textField($model,'recursos',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'recursos'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'valoracion'); ?>">
		<?php echo $form->labelEx($model,'valoracion'); ?>
		<div class="input-prepend">
			<span class="add-on">Fecha</span>
			
			<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'valoracion',
				'language'=>'es',
				'options'=> array(
					'dateFormat'=>'yy-mm-dd', 
					'altFormat'=>'dd-mm-yy', 
					'changeMonth'=>'true', 
					'changeYear'=>'true', 
					'yearRange'=>'2010:2012', 
					'showOn'=>'both',
					'buttonText'=>'<i class="icon-calendar"></i>'
				),
			));
			
			?>	
			<?php echo $form->error($model,'valoracion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_did'); ?>">
		<?php echo $form->labelEx($model,'estatus_did'); ?>
		<div class="input-prepend">
			<span class="add-on">Sel.</span>
			
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>
			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>
	
	<div class="well">
		<h3>Seleccione las estrategias</h3>
		<div class="row">	
			<div class="span12">	
				<table>		
			<?php		        
		        echo CHtml::checkBoxList('estrategias',array(),
		        		CHtml::listData(Estrategia::model()->findAll(array('order'=>'id ASC')),'id','descripcion'),
		        		array("template" =>'<tr><td style="padding:10px;">{input}</td><td>{label}</td></tr>',
		                    "separator" => "",
		                    "checkAll" => "Seleccionar todos",
		                    "style" => "width: 10px;",
		                ));	
	        ?>
	        	</table>
			</div>
		</div>
    </div>
	
	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
