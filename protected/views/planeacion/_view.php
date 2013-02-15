	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->anio); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->descripcion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->persona->nombre); ?>
		</td>
	</tr>