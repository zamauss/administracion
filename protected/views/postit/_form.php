<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'postit-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'nombre'),
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="well">
		<h3>Escriba el mensaje</h3>
		<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<div class="input">
				
				<?php echo $form->textArea($model,'nombre',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>
		
		<label class="checkbox">
	      <?php echo CHtml::checkBox('notificar'); ?> Notificar por <i class="icon-envelope"></i>
	    </label>
	</div>
	
	<div class="well">
		<h3>Seleccione quienes rebirán el Post-it</h3>
		<div class="row">	
			<div class="span12">			
			<?php		        
		        echo $form->checkBoxList($model,'personaDestinatario_aid', 
		        		CHtml::listData(Persona::model()->findAll(array('condition' => 'estatus_did = 1','order'=>'nombre ASC')),'id','nombre'),
		        		array("template" =>'<div class="span2"><table><tr><td>{input}</td><td>{label}</td></tr></table></div>',
		                    "separator" => "",
		                    "checkAll" => "Seleccionar Todos",
		                    "style" => "width: 10px;",
		                ));	
		        echo $form->error($model,'personaDestinatario_aid');
	        ?>
			</div>
		</div>
    </div>
    
	<div class="actions" style="margin-top:20px;">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear Postit' : 'Guardar Postit'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
