<?php

	$this->pageCaption='Panel de proyectos';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='internos y externos';
	$this->breadcrumbs=array(
		'Activos Asignados',
	);
	
	$this->menu=array(
		array('label'=>'Listar Activo', 'url'=>array('index')),
		array('label'=>'Administrar Activo', 'url'=>array('admin')),
	);
	
	$usuario = Usuario::model()->find('usuario="' . Yii::app()->user->name .'"');
	$persona = Persona::model()->find('usuario_did = ' . $usuario->id);
	$planeacionesInternas = array();
?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li><a href="#tab1" data-toggle="tab">Planeaciones</a></li>
    <li><a href="#tab2" data-toggle="tab">Activos</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      	<div class="alert alert-info">		  
		  <h4>Proyectos Propios</h4>			  
		</div>
      <div class="accordion" id="accordion2">
      	<?php       	
      		$departamento = Departamento::model()->find('id = ' . $persona->departamento_did);
      		$planeaciones = Planeacion::model()->findAll('persona_aid = ' . $departamento->persona_aid);      		
      		$contador = 0;
      		if(!empty($planeaciones))
      		{
	      		foreach($planeaciones as $planeacion){
	      			$contador++;
	      			$planeacionesInternas[$contador] = $planeacion->id;
	      	?>      				
					  <div class="accordion-group">
					    <div class="accordion-heading">					    	
					      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $contador;?>">
					        <?php echo $planeacion->nombre . ' del año ' . $planeacion->anio; ?>					        
					      </a>
					    </div>
					    <div id="collapse<?php echo $contador; ?>" class="accordion-body collapse in">
					      <div class="accordion-inner">
					      	<?php
					      		$objetivos = Objetivo::model()->findAll('planeacion_did = ' . $planeacion->id . ' && responsable_aid = ' . $persona->id . ' || persona_aid = ' . $persona->id);
					      		echo CHtml::link('<span class="label label-success">Nuevo Objetivo</span>',array('objetivo/create', 'planeacion_did'=>$planeacion->id)); ?>
		         			<table class="table table-striped" style="font-size:8pt;">
		         				<caption><h4>Listado de objetivos</h4></caption>
		         				<thead class="thead">
		         					<tr>
		         						<td><strong>Acciones</strong></td>
		         						<td class="hidden-phone"><strong>Id.</strong></td>
		         						<td class="hidden-phone"><strong>Cumplimiento</strong></td>
		         						<td class="hidden-phone"><strong>Plazo</strong></td>
		         						<td class="hidden-phone"><strong>Responsable</strong></td>
		         						<td><strong>Descripción</strong></td>
		         						<td class="hidden-phone hidden-tablet"><strong>Meta Cuantitativa</strong></td>
		         						<td class="hidden-phone hidden-tablet"><strong>Valoración</strong></td>
		         						<td class="hidden-phone hidden-tablet"><strong>Persona</strong></td>
		         						<td class="hidden-phone"><strong>Estatus</strong></td>				         						
		         					</tr>
		         				</thead>
		         				<tbody>
		         				<?php foreach($objetivos as $objetivo){ ?>
		         					
		         					<tr>
		         						<td style="width:20px;">
											<div class="btn-group">
												<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">					
													<span class="caret"/>
												</button>
												<ul class="dropdown-menu">							
													<li>
														<?php 
															if($objetivo->estatus_did == 1)
																echo CHtml::link('<i class="icon-ok"></i> Ya la hice', array('objetivo/cambiarestatus', 'id'=>$objetivo->id)); 
															else
																echo CHtml::link('<i class="icon-remove"></i> No la hice', array('objetivo/cambiarestatus', 'id'=>$objetivo->id)); 
														?>
													</li>
													<li>
														<?php
															echo CHtml::link('<i class="icon-repeat"></i> Actualizar', array('objetivo/update','id'=>$objetivo->id));
														?>
													</li>
													<li>
														<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Objetivo', array('objetivo/view', 'id'=>$objetivo->id)); ?>
													</li>
													<li class="divider"></li>
													<li>
														<?php echo CHtml::link('<i class="icon-comment"></i> Agregar Nota', array('nota/create', 'objetivo_did'=>$objetivo->id)); ?>
													</li>
												</ul>
											</div>
										</td>
		         						<td class="hidden-phone"><?php echo $objetivo->numero;?></td>
		         						<td class="hidden-phone"><?php 
		         							if($objetivo->fechaCumplimiento!='0000-00-00')
		         							{
			         							$fecha = new DateTime($objetivo->fechaCumplimiento);
												$fecha = $fecha->format('Y-m-d');
												$hoy = new DateTime(date('Y-m-d'));
												$hoy = $hoy->format('Y-m-d');
												
			         							if($fecha==$hoy)
													echo '<span class="label label-warning">' .
														CHtml::encode($objetivo->fechaCumplimiento) . '</span>';
												else if($fecha<=$hoy)
													echo '<span class="label label-important">' . 
														CHtml::encode($objetivo->fechaCumplimiento) . '</span>';
												else
													echo '<span class="label label-success">' . 
														CHtml::encode($objetivo->fechaCumplimiento) . '</span>';
		         							}
		         						?></td>
		         						<td class="hidden-phone"><?php if($objetivo->plazo->nombre != 'Ninguno') 
		         									echo $objetivo->plazo->nombre;
		         						?></td>
		         						<td class="hidden-phone"><?php echo $objetivo->responsable->nombre;?></td>
		         						<td style="font-size:9pt;">
			         							<?php 
			         								$notas = Nota::model()->findAll('objetivo_did = ' . $objetivo->id);
			         								$resumenNota = "";
			         								foreach($notas as $nota)
			         								{
				         								$resumenNota = $resumenNota . '<strong>' . $nota['nombre'] . '</strong><br/>' .
				         												$nota['descripcion'] . '<br/><br/>';				         							
			         								}			         								
			         								echo CHtml::link($objetivo->descripcion, array('objetivo/view', 'id'=>$objetivo->id));
													if(count($notas)>0)
													{
														echo '  ' . CHtml::link(count($notas), array('objetivo/view', 'id'=>$objetivo->id), 
											         								array('class'=>'label label-info nota',
																							'rel'=>'popover',
																							'data-content' => $resumenNota,
																							'data-original-title' => 'Notas',
																						));
													}
													
			         							?>
		         						</td>		         						
		         						<td class="hidden-phone hidden-tablet" style="width:200px;"><?php echo $objetivo->metaCuantitativa;?></td>
		         						<td class="hidden-phone hidden-tablet"><?php 
		         							if($objetivo->valoracion!='0000-00-00')
		         							{
			         							$fecha = new DateTime($objetivo->valoracion);
												$fecha = $fecha->format('Y-m-d');
												$hoy = new DateTime(date('Y-m-d'));
												$hoy = $hoy->format('Y-m-d');
												
			         							if($fecha==$hoy)
													echo '<span class="label label-warning">' .
														CHtml::encode($objetivo->valoracion) . '</span>';
												else if($fecha<=$hoy)
													echo '<span class="label label-important">' . 
														CHtml::encode($objetivo->valoracion) . '</span>';
												else
													echo '<span class="label label-success">' . 
														CHtml::encode($objetivo->valoracion) . '</span>';
		         							}
		         							else
		         							{
			         							echo '<span class="label label-info">' . 
														CHtml::encode('No existe') . '</span>';
		         							}
		         						?></td>
		         						<td class="hidden-phone hidden-tablet"><?php echo $objetivo->persona->nombre;?></td>		         						
		         						<td class="hidden-phone"><?php if($objetivo->estatus->nombre == 'Activo')
			         								echo '<span class="label label-warning">Pendiente</span>';
			         							else
			         								echo '<span class="label label-success">Realizado</span>';
		         						?></td>
		         					</tr>
		         				<?php } ?>
		         				</tbody>
		         			</table>
		         			<div style="height:80px;"></div>
					      </div>
					    </div>
					  </div>	
			<?php } 
			}
			else{
				echo 'No hay planeaciones';
			}
			?>
<br/>
			<div class="alert alert-info">		  
			  <h4>Otros Proyectos</h4>			  
			</div>
			<?php
				$condicion = "";				
				if(!empty($planeacionesInternas))
				{				
					for($i = 0; $i<=count($planeacionesInternas); $i++)
					{
						$condicion = ' && planeacion_did != ' . $planeacionesInternas[$i] . $condicion;
					}
					
					$condicion = substr($condicion, 0, -3);
				}
				
				$sql = 'select distinct(p.nombre) as planeaciones, p.id as planid
							from Objetivo o
							inner join Planeacion p on p.id = o.planeacion_did
							where responsable_aid = ' . $persona->id . $condicion . ' 
							order by planeacion_did ASC;';
				
				$connection=Yii::app()->db;
				$command=$connection->createCommand($sql);
				$planeacionesExternas=$connection->createCommand($sql)->queryAll();			
							
	      		$objetivosExternos = Objetivo::model()->findAll('responsable_aid = ' . $persona->id);
	      		if(!empty($objetivosExternos))
	      		{
		      		foreach($planeacionesExternas as $planeacionExterna){
		      			$contador++;
		      	?>      				
						  <div class="accordion-group">
						    <div class="accordion-heading">					    	
						      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $contador;?>">
						        <?php echo $planeacionExterna['planeaciones']; ?>					        
						      </a>
						    </div>
						    <div id="collapse<?php echo $contador; ?>" class="accordion-body collapse">
						      <div class="accordion-inner">
						      	<?php
						      		$objetivosExternos = Objetivo::model()->findAll('planeacion_did = ' . $planeacionExterna['planid'] . ' && responsable_aid = ' . $persona->id);
						      	?>
			         			<table class="table table-striped" style="font-size:8pt;">
		         				<caption><h4>Listado de objetivos</h4></caption>
		         				<thead class="thead">
		         					<tr>
		         						<td><strong>Acciones</strong></td>
		         						<td class="hidden-phone"><strong>Id.</strong></td>
		         						<td class="hidden-phone"><strong>Cumplimiento</strong></td>
		         						<td class="hidden-phone"><strong>Plazo</strong></td>
		         						<td class="hidden-phone"><strong>Responsable</strong></td>
		         						<td><strong>Descripción</strong></td>
		         						<td class="hidden-phone hidden-tablet"><strong>Meta Cuantitativa</strong></td>
		         						<td class="hidden-phone hidden-tablet"><strong>Valoración</strong></td>
		         						<td class="hidden-phone hidden-tablet"><strong>Persona</strong></td>
		         						<td class="hidden-phone"><strong>Estatus</strong></td>		         						
		         					</tr>
		         				</thead>
		         				<tbody>
		         				<?php foreach($objetivosExternos as $objetivoExterno){ ?>
		         					
		         					<tr>
		         						<td style="width:20px;">
											<div class="btn-group">
												<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">					
													<span class="caret"/>
												</button>
												<ul class="dropdown-menu">							
													<li>
														<?php 
															if($objetivoExterno->estatus_did == 1)
																echo CHtml::link('<i class="icon-ok"></i> Ya la hice', array('objetivo/cambiarestatus', 'id'=>$objetivoExterno->id)); 
															else
																echo CHtml::link('<i class="icon-remove"></i> No la hice', array('objetivo/cambiarestatus', 'id'=>$objetivoExterno->id)); 
														?>
													</li>
													<li>
														<?php
															echo CHtml::link('<i class="icon-repeat"></i> Actualizar', array('objetivo/update','id'=>$objetivoExterno->id));
														?>
													</li>
													<li>
														<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Objetivo', array('objetivo/view', 'id'=>$objetivoExterno->id)); ?>
													</li>
													<li class="divider"></li>
													<li>
														<?php echo CHtml::link('<i class="icon-comment"></i> Agregar Nota', array('nota/create', 'objetivo_did'=>$objetivoExterno->id)); ?>
													</li>
												</ul>
											</div>
										</td>
		         						<td class="hidden-phone"><?php echo $objetivoExterno->numero;?></td>
		         						<td class="hidden-phone"><?php 
		         							if($objetivoExterno->fechaCumplimiento!='0000-00-00')
		         							{
			         							$fecha = new DateTime($objetivoExterno->fechaCumplimiento);
												$fecha = $fecha->format('Y-m-d');
												$hoy = new DateTime(date('Y-m-d'));
												$hoy = $hoy->format('Y-m-d');
												
			         							if($fecha==$hoy)
													echo '<span class="label label-warning">' .
														CHtml::encode($objetivoExterno->fechaCumplimiento) . '</span>';
												else if($fecha<=$hoy)
													echo '<span class="label label-important">' . 
														CHtml::encode($objetivoExterno->fechaCumplimiento) . '</span>';
												else
													echo '<span class="label label-success">' . 
														CHtml::encode($objetivoExterno->fechaCumplimiento) . '</span>';
		         							}
		         						?></td>
		         						<td class="hidden-phone"><?php if($objetivoExterno->plazo->nombre != 'Ninguno') 
		         									echo $objetivoExterno->plazo->nombre;
		         						?></td>
		         						<td class="hidden-phone"><?php echo $objetivoExterno->responsable->nombre;?></td>
		         						<td style="font-size:9pt;">
			         							<?php 
			         								$notas = Nota::model()->findAll('objetivo_did = ' . $objetivoExterno->id);
			         								$resumenNota = "";
			         								foreach($notas as $nota)
			         								{
				         								$resumenNota = $resumenNota . '<strong>' . $nota['nombre'] . '</strong><br/>' .
				         												$nota['descripcion'] . '<br/><br/>';				         							
			         								}			         								
			         								echo CHtml::link($objetivoExterno->descripcion, array('objetivo/view', 'id'=>$objetivoExterno->id));
													if(count($notas)>0)
													{
														echo '  ' . CHtml::link(count($notas), array('objetivo/view', 'id'=>$objetivoExterno->id), 
											         								array('class'=>'label label-info nota',
																							'rel'=>'popover',
																							'data-content' => $resumenNota,
																							'data-original-title' => 'Notas',
																						));
													}
													
			         							?>
		         						</td>		         						
		         						<td class="hidden-phone hidden-tablet" style="width:200px;"><?php echo $objetivoExterno->metaCuantitativa;?></td>
		         						<td class="hidden-phone hidden-tablet"><?php 
		         							if($objetivoExterno->valoracion!='0000-00-00')
		         							{
			         							$fecha = new DateTime($objetivoExterno->valoracion);
												$fecha = $fecha->format('Y-m-d');
												$hoy = new DateTime(date('Y-m-d'));
												$hoy = $hoy->format('Y-m-d');
												
			         							if($fecha==$hoy)
													echo '<span class="label label-warning">' .
														CHtml::encode($objetivoExterno->valoracion) . '</span>';
												else if($fecha<=$hoy)
													echo '<span class="label label-important">' . 
														CHtml::encode($objetivoExterno->valoracion) . '</span>';
												else
													echo '<span class="label label-success">' . 
														CHtml::encode($objetivoExterno->valoracion) . '</span>';
		         							}
		         							else
		         							{
			         							echo '<span class="label label-info">' . 
														CHtml::encode('No existe') . '</span>';
		         							}
		         						?></td>
		         						<td class="hidden-phone hidden-tablet"><?php echo $objetivoExterno->persona->nombre;?></td>		         						
		         						<td class="hidden-phone"><?php if($objetivoExterno->estatus->nombre == 'Activo')
			         								echo '<span class="label label-warning">Pendiente</span>';
			         							else
			         								echo '<span class="label label-success">Realizado</span>';
		         						?></td>
		         					</tr>
		         				<?php } ?>
		         				</tbody>
		         			</table>
			         			<div style="height:80px;"></div>
						      </div>
						    </div>
						  </div>	
				<?php } 
				}
				else{
					echo 'No hay planeaciones';
				}
			?>
		
		</div>
    </div>
    <div class="tab-pane" id="tab2">
      <p>A continuación se mostrarán los activos que tienes asignados.</p>
<?php   $connection = Yii::app()->db;
		$query = 'select a.id, ta.nombre as TipoActivo, m.nombre as Marca, a.descripcion as Descripcion, a.numeroSerie as NumeroSerie, a.fecha_f as Fecha, a.aceptado as Aceptado,
					ca.nombre as Categoria, a.precio as Precio, ea.nombre as EstadoActivo, ar.nombre as Area 
					from Activo a
					inner join TipoActivo ta on ta.id = a.tipoActivo_did
					inner join Marca m on m.id = a.marca_did
					inner join CategoriaActivo ca on ca.id = a.categoriaActivo_did
					inner join EstadoActivo ea on ea.id = a.estadoActivo_did
					inner join Area ar on ar.id = a.area_did
					where persona_aid = (
					select id from Persona where usuario_did = (
						select id from Usuario where usuario = "' . Yii::app()->user->name . '"));';
		$commandActivosPorPersona = $connection->createCommand($query);
		$activosPorPersona = $commandActivosPorPersona->queryAll();
		?>
	<table class="table table-striped table-bordered">
		<tr>
			<td><b>#</b></td>
			<td><b>Tipo Activo</b></td>
			<td><b>Marca</b></td>
			<td><b>Descripción</b></td>
			<td><b>Número de Serie</b></td>
			<td><b>Asignado en</b></td>
			<td><b>Categoría</b></td>
			<td><b>Precio</b></td>
			<td><b>Estado</b></td>
			<td><b>Área</b></td>
			<td><b>Aceptado</b></td>
		</tr>
		<?php foreach($activosPorPersona as $activo){ ?>
				<tr>
					<td><?php echo $activo['id'];  	?></td>
					<td><?php echo $activo['TipoActivo'];  	?></td>
					<td><?php echo $activo['Marca']; 		?></td>
					<td><?php echo $activo['Descripcion']; 	?></td>
					<td><?php echo $activo['NumeroSerie']; 	?></td>
					<td><?php echo $activo['Fecha']; 		?></td>
					<td><?php echo $activo['Categoria']; 		?></td>
					<td><?php echo $activo['Precio']; 		?></td>
					<td><?php echo $activo['EstadoActivo']; 		?></td>
					<td><?php echo $activo['Area']; 		?></td>
					<td><?php echo ($activo['Aceptado'] == 1) ? 
							"Si" : 
							CHtml::link('Acuerdo',"#", array("submit"=>array('activo/actualizaacuerdo', 'id'=>$activo['id']), 'confirm' => 'Recuerda que será tu responsabilidad este activo.'));
						?>
					</td>
				</tr>
		<?php } ?>
	</table>
    </div>
  </div>
</div>

<script>  
	$(function ()  
	{ 
		$(".nota").popover({title: 'Notas', content: "Contenido"});  
	});  
</script>  