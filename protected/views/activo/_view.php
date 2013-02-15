	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->persona->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->area->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->cantidad); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tipoActivo->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->categoriaActivo->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->marca->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estadoActivo->nombre); ?>
		</td>		
		<td>
			<?php echo CHtml::encode($data->descripcion); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->numeroSerie); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->precio); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->aceptado); ?>
		</td>
		*/ ?>
	</tr>