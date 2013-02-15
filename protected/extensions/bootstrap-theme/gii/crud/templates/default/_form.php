<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('BActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<?php echo "<?php \$this->widget('BAlert',array(\n
		'content'=>'<p>Los campos marcados con <span class=\"required\">*</span> son requeridos.</p>'
	)); ?>\n"; ?>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="<?php echo "<?php echo \$form->fieldClass(\$model, '$column->name'); ?>"; ?>">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<div class="input">
			
			<?php 
				$partes = explode('_',$column->name);
				$finalCampo=$partes[count($partes)-1];
				//echo $finalCampo;
				
				if($finalCampo=='did'){
					$modeloColumna=ucwords($partes[0]);
					echo '<?php echo $form->dropDownList($model,\''.$column->name.'\',CHtml::listData('.$modeloColumna."::model()->findAll(), 'id', 'nombre')); ?>";
				}
				else if($finalCampo=='aid'){
					$modeloColumna=$partes[0];
					
					echo "<?php \$this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
					      'model'=>\$model, 
					      'attribute'=>'$column->name', 
					      'sourceUrl'=>Yii::app()->createUrl('$modeloColumna/autocompletesearch'), 
					      'showFKField'=>false,
					      'relName'=>'$modeloColumna', // the relation name defined above
					      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display

					      'options'=>array(
					          'minLength'=>1, 
					      ),
					 )); ?>";
				}
				else if($finalCampo=='f'){
					echo "<?php
					if (\$model->$column->name!='') 
						\$model->$column->name=date('d-m-Y',strtotime(\$model->$column->name));
					\$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>\$model,
					                                       'attribute'=>'$column->name',
					                                       'value'=>\$model->$column->name,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>\"readonly\"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>\$model->$column->name,
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
					                                               'minDate'=>\"-70Y\", //fecha minima
					                                               'maxDate'=> \"+10Y\", //fecha maxima
					                                       ),)); ?>";
				}
				
				else{
					echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n";
				}
				 
			?>
			<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
	</div>

<?php
}
?>
	<div class="actions">
		<?php echo "<?php echo BHtml::submitButton(\$model->isNewRecord ? 'Crear' : 'Guardar'); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->
