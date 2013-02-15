	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estrategia->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->objetivoGeneral->nombre); ?>
		</td>
	</tr>