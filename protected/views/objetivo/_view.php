	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->numero); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCumplimiento); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->plazo->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->responsable->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->descripcion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->persona->nombre); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->metaCuantitativa); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->recursos); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->valoracion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->objetivoGeneral->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->indicador); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCreacion); ?>
		</td>
		*/ ?>
	</tr>