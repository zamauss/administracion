	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->direccion); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->telefono); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->celular); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->correo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->departamento->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario->usuario); ?>
		</td>
	</tr>