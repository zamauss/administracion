<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="wide form">

<?php echo "<?php \$form=\$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<div class="clearfix">
		<?php echo "<?php echo \$form->label(\$model,'{$column->name}'); ?>\n"; ?>
		<div class="input">
			
			<?php 
				$partes = explode('_',$column->name);
				$finalCampo=$partes[count($partes)-1];
				//echo $finalCampo;
				
				if($finalCampo=='did'){
					$modeloColumna=ucwords($partes[0]);
					echo '<?php echo $form->dropDownList($model,'.$column->name.',CHtml::listData('.$modeloColumna."::model()->findAll(), 'id', 'nombre')); ?>";
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
					if (\$$column->name!='') 
						\$$column->name=date('d-m-Y',strtotime(\$$column->name));
					\$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>\$model,
					                                       'attribute'=>'$column->name',
					                                       'value'=>\$$column->name,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>\"readonly\"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>\$$column->name,
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
		</div>
	</div>

<?php endforeach; ?>
	<div class="actions">
		<?php echo "<?php echo BHtml::submitButton('Buscar'); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->
