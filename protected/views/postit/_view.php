	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tipoPostit->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->personaRemitente->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->personaDestinatario->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha); ?>
		</td>
	</tr>