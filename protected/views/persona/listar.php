<?php
$this->pageCaption='¿A quién quieres asignarle activos?';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Elige uno';
$this->breadcrumbs=array(
	'Activo',
);
$personas = Persona::model()->findAll();

//Materias por maestro
$connection = Yii::app()->db;
$queryPersonaSinActivos = 'SELECT p.id ,p.nombre, d.nombre as depto FROM Persona p
							INNER JOIN Departamento d ON d.id = p.departamento_did
							WHERE p.id
							NOT IN (
							SELECT a.persona_aid
							FROM Activo a
							);';

$commandPersonaSinActivos = $connection->createCommand($queryPersonaSinActivos);
$personaSinActivos = $commandPersonaSinActivos->queryAll();
				
?>

<div class="alert alert-info">		  
  <h4>Personas SIN Activos!</h4>
  Por favor agregue activos a las siguientes personas
</div>

<table class="table table-bordered">
	<tr>
		<td style="width:20px;"><b>#</b></td>
		<td><b>Nombre</b></td>
		<td><b>Departamento</b></td>
	</tr>
	<?php foreach($personaSinActivos as $personasinactivo) { ?>
		<tr>
			<td><?php echo $personasinactivo['id']; ?></td>
			<td><?php echo CHtml::link($personasinactivo['nombre'],array('/activo/create', 'persona_aid'=>$personasinactivo['id'])); ?></td>
			<td><?php echo $personasinactivo['depto']; ?></td>
		</tr>
	<?php } ?>
</table>

<div class="alert alert-info">		  
  <h4>Personas CON Activos!</h4>
</div>

<table class="table table-bordered">
	<tr>
		<td style="width:20px;"><b>#</b></td>
		<td><b>Nombre</b></td>
		<td><b>Departamento</b></td>
	</tr>
	<?php foreach($personas as $persona) { ?>
		<tr>
			<td><?php echo $persona->id; ?></td>
			<td><?php echo CHtml::link($persona->nombre,array('/activo/create', 'persona_aid'=>$persona->id)); ?></td>
			<td><?php echo $persona->departamento->nombre; ?></td>
		</tr>
	<?php } ?>
</table>

