<?php
	$this->pageCaption='Panel de proyectos';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='internos y externos';
	$this->breadcrumbs=array(
		'Panel Principal',
	);
	
	$usuario = Usuario::model()->find('usuario="' . Yii::app()->user->name .'"');
	$persona = Persona::model()->find('usuario_did = ' . $usuario->id);
	$departamento = Departamento::model()->find('id = ' . $persona->departamento_did);
	$planeacionesInternas = array();
	$postits = Postit::model()->findAll('personaDestinatario_aid = ' . $persona->id);
	$postitsNuevos = 0;
	foreach($postits as $postitNuevo)
	{
		if($postitNuevo->estatus_did == 1)
			$postitNuevos++;
	}
?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Planeaciones o proyectos</a></li>    
    <li><a href="#tab3" data-toggle="tab"><span class="badge badge-warning"><?php echo $postitNuevos; ?> </span> Mi corcho</a></li>
    <li><a href="#tab2" data-toggle="tab">Activos</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      	<div class="alert alert-info">		  
		  <h4>Proyecto propios</h4>		  
		</div>
      <div class="accordion" id="accordion2">
      	<?php       		
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
<?php /* -------------------- Contenido de los objetivos generales -----------------------*/ ?>
					    <div id="collapse<?php echo $contador; ?>" class="accordion-body collapse">
					      <div class="accordion-inner" style="overflow:scroll;">
					      	<?php
					      		$objetivosGenerales = ObjetivoGeneral::model()->findAll('planeacion_did = ' . $planeacion->id . ' && estatus_did = 1');
					      	?>
					      	<br/><br/>
					      	<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
							  <ul class="nav nav-tabs">
							  	<?php
							  		$cog = 1;
							  		foreach ($objetivosGenerales as $objGral)
							  		{
							  			if($cog==1)
									  		echo '<li class="active"><a href="#tabOE' . $cog . '" data-toggle="tab">' . $objGral->numero . '</a></li>';
								  		else
								  			echo '<li><a href="#tabOE' . $cog . '" data-toggle="tab">' . $objGral->numero . '</a></li>';								  		
								  		$cog++;
							  		}
							  	?>
							  </ul>
							  <div class="tab-content">
							  	<?php
							  		$cogDesc = 1;
							  		$pestanaActiva = ' active';
							  		foreach ($objetivosGenerales as $objGral)
							  		{
							  			//$objetivos = Objetivo::model()->findAll('objetivoGeneral_did = ' . $objGral->id . ' && responsable_aid = ' . $persona->id. ' || persona_aid = ' . $persona->id . ' && objetivoGeneral_did = ' . $objGral->id);
							  	?>
									  		<div class="tab-pane<?php echo $pestanaActiva; ?>" id="tabOE<?php echo $cogDesc; ?>">									  			
									  			<div class="well">									  				
									  				<h3>
									  					<?php 									  						
									  						echo $objGral->descripcion; 									  						
									  					?>
												  		<div class="btn-group">
															<button class="btn btn-success btn-mini dropdown-toggle objGral" data-toggle="dropdown" data-content='
										  						<blockquote>
																  <p>Identificador</p>
																  <small><?php echo $objGral->numero;?></small>
																</blockquote>
																<blockquote>
																  <p>Fecha de cumplimiento</p>
																  <small><?php echo $objGral->fechaCumplimiento;?></small>
																</blockquote>
																<blockquote>
																  <p>Plazo</p>
																  <small><?php echo $objGral->plazo->nombre;?></small>
																</blockquote>
																<blockquote>
																  <p>Responsable</p>
																  <small><?php echo $objGral->responsable->nombre;?></small>
																</blockquote>
																<blockquote>
																  <p>Indicador</p>
																  <small><?php echo $objGral->indicador;?></small>
																</blockquote>
																<blockquote>
																  <p>Meta cuantitativa</p>
																  <small><?php echo $objGral->metaCuantitativa;?></small>
																</blockquote>
																<blockquote>
																  <p>Recursos</p>
																  <small><?php echo $objGral->recursos;?></small>
																</blockquote>
																<blockquote>
																  <p>Valoración</p>
																  <small><?php echo $objGral->valoracion;?></small>
																</blockquote>
																<blockquote>
																  <p>Estatus</p>
																  <small><?php echo $objGral->estatus->nombre;?></small>
																</blockquote>
											  					' data-original-title="<?php echo $objGral->numero; ?>">
																Ver más					
																<span class="caret"/>
															</button>
															<ul class="dropdown-menu">	
																<li class="divider"></li>						
																<li>
																	<?php echo CHtml::link('<i class="icon-list-alt"></i> Detalle Objetivo', 
																							array('objetivoGeneral/view', 'id'=>$objGral->id)); ?>
																</li>																
																<li class="divider"></li>																																
															</ul>
														</div>
										  			</h3>
									  			</div>  
									  			<?php echo CHtml::button('Nuevo objetivo específico', array('submit' => array('objetivo/create', 'objetivoGeneral_did' => $objGral->id), 'class'=>'btn btn-success')); ?>
									  			<?php 
													$pestanaActiva = '';
													$cadenaLimpia = str_replace(' ', '', $objGral->numero);
												?>										  
								  			<div class="tabbable" style="margin-top:10px;"> <!-- Only required for left/right tabs -->
												  <ul class="nav nav-tabs">												  	
												    <li class="active"><a href="#tab<?php echo $cadenaLimpia; ?>p1" data-toggle="tab">Pendientes</a></li>
												    <li><a href="#tab<?php echo $cadenaLimpia; ?>p2" data-toggle="tab">Realizadas</a></li>
												    <li><a href="#tab<?php echo $cadenaLimpia; ?>p3" data-toggle="tab">Todas</a></li>
												  </ul>
												  <div class="tab-content">
<?php /* -------------------- Contenido de las actividades pendientes -----------------------*/ ?>
												    <div class="tab-pane active" id="tab<?php echo $cadenaLimpia; ?>p1">
												      <?php $objetivosPendientes = Objetivo::model()->findAll('objetivoGeneral_did = ' . $objGral->id . ' && estatus_did = 1 && responsable_aid = ' . $persona->id . ' || objetivoGeneral_did = ' . $objGral->id . ' && estatus_did = 1 && persona_aid = ' . $persona->id . ' ORDER BY numero ASC'); ?>
												      <table class="table table-striped" style="font-size:8pt;">
								         				<caption><h4>Listado de objetivos pendientes</h4></caption>
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
								         						<td class="hidden-phone hidden-tablet"><strong>Capturado por</strong></td>
								         						<td class="hidden-phone"><strong>Estatus</strong></td>
								         					</tr>
								         				</thead>
								         				<tbody>
								         				<?php foreach($objetivosPendientes as $objetivo){ ?>
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
																					echo CHtml::link('<i class="icon-repeat"></i> Actualizar', array('objetivo/update','id'=>$objetivo->id, 'objetivoGeneral_did'=>$objetivo->objetivoGeneral_did));
																				?>
																			</li>
																			<li>
																				<?php
																					echo CHtml::link('<i class="icon-trash"></i> Eliminar', 
																					array('objetivo/cambiarestatus','id'=>$objetivo->id, 'tipoEstatus' => 3));
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
								         							else
								         							{
									         							//echo '<span style="width:20px;" class="label label-info">' . CHtml::encode('No existe') . '</span>';
								         							}
								         						?></td>
								         						<td class="hidden-phone"><?php if($objetivo->plazo->nombre != 'Ninguno') 
								         									echo $objetivo->plazo->nombre;
								         						?></td>
								         						<td class="hidden-phone"><?php echo $objetivo->responsable->nombre;?></td>
								         						<td style="font-size:9pt;">
								         							<?php 
								         								$notas = Nota::model()->findAll('objetivo_did = ' . $objetivo->id);
								         								$resumenNota = '';
								         							?>	
							         								<div id="nota-<?php echo $objetivo->id; ?>" 
							         													class="modal hide fade in" style="display: none; ">  
																		<div class="modal-header">  
																			<a class="close" data-dismiss="modal">×</a>  
																			<h3><?php echo $objetivo->descripcion; ?></h3>  
																		</div>  
																		<div class="modal-body" >
																			<?php
										         								foreach($notas as $nota)
										         								{							         									
										         									if($nota->persona_aid == $persona->id)
										         									{
											         									$tipoNota = 'left';
											         									$alert = 'success';
										         									}
										         									else
										         									{
											         									$tipoNota = 'right';
											         									$alert = 'info';
										         									}
										         									
											         								$resumenNota = $resumenNota . 
										         									'<blockquote style="text-align:' . $tipoNota . '">'. 
										         										'<p class="text-warning">'.
										         											'<strong>'.$nota->persona->nombre . ' dice en: </strong>'.
										         										'<p/>'.
										         										'<strong>' . $nota->nombre . '</strong>' . 
										         										'<p> ' . $nota->descripcion . '</p>' .
										         										'<small>' . $nota->fecha . '</small>' .
										         									'</blockquote>';
										         								}
								         								
								         								 		echo $resumenNota;
								         								 	?> 
								         								 	<br/>
																		</div>  
																		<div class="modal-footer">  
																			<?php echo CHtml::link('<i class="icon-comment icon-white">
																			</i> Agregar Nota', 
																			array('nota/create', 'objetivo_did'=>$objetivo->id), 
																			array('class'=>'btn btn-success')); ?>
																			<a href="#" class="btn" data-dismiss="modal">Cerrar</a>  
																		</div>  
																	</div>
																	<?php
								         								echo CHtml::link($objetivo->descripcion . ' ', 
								         									array('objetivo/view', 'id'=>$objetivo->id));
																		if(count($notas)>0)
																		{																			
																			echo '<a data-toggle="modal" href="#nota-' . $objetivo->id .  
																				'" class="label label-success">Notas: ' . count($notas) . ' </a>';				
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
									         			<div style="height:100px;"></div>
												    </div>
<?php /* -------------------- Contenido de las actividades realizadas -----------------------*/ ?>
												    <div class="tab-pane" id="tab<?php echo $cadenaLimpia; ?>p2">
												      <?php $objetivosRealizados = Objetivo::model()->findAll('objetivoGeneral_did = ' . $objGral->id . ' && estatus_did = 2 && responsable_aid = ' . $persona->id . ' || objetivoGeneral_did = ' . $objGral->id . ' && estatus_did = 2 && persona_aid = ' . $persona->id . ' ORDER BY numero ASC'); ?>
												      <table class="table table-striped" style="font-size:8pt;">
								         				<caption><h4>Listado de objetivos realizados</h4></caption>
								         				<thead class="thead">
								         					<tr>
								         						<td><strong>Acciones</strong></td>
								         						<td class="hidden-phone"><strong>Id.</strong></td>
								         						<td class="hidden-phone"><strong>Cumplimiento</strong></td>
								         						<td class="hidden-phone"><strong>Plazo</strong></td>
								         						<td class="hidden-phone"><strong>Responsable</strong></td>
								         						<td><strong>Descripción</strong></td>
								         						<td class="hidden-phone hidden-tablet"><strong>Meta Cuantitativa</strong></td>
								         						<td class="hidden-phone hidden-tablet"><strong>Terminado en</strong></td>
								         						<td class="hidden-phone hidden-tablet"><strong>Capturado por</strong></td>
								         						<td class="hidden-phone"><strong>Estatus</strong></td>
								         					</tr>
								         				</thead>
								         				<tbody>
								         				<?php foreach($objetivosRealizados as $objetivo){ ?>
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
																					echo CHtml::link('<i class="icon-repeat"></i> Actualizar', array('objetivo/update','id'=>$objetivo->id, 'objetivoGeneral_did'=>$objetivo->objetivoGeneral_did));
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
																		echo '<span class="label">' . CHtml::encode($objetivo->fechaCumplimiento) . '</span>';
								         							}
								         						?></td>
								         						<td class="hidden-phone"><?php if($objetivo->plazo->nombre != 'Ninguno') 
								         									echo $objetivo->plazo->nombre;
								         						?></td>
								         						<td class="hidden-phone"><?php echo $objetivo->responsable->nombre;?></td>
								         						<td style="font-size:9pt;">
								         							<?php 
								         								$notas = Nota::model()->findAll('objetivo_did = ' . $objetivo->id);
								         								$resumenNota = '';
								         							?>	
							         								<div id="nota-<?php echo $objetivo->id; ?>" 
							         													class="modal hide fade in" style="display: none; ">  
																		<div class="modal-header">  
																			<a class="close" data-dismiss="modal">×</a>  
																			<h3><?php echo $objetivo->descripcion; ?></h3>  
																		</div>  
																		<div class="modal-body" >
																			<?php
										         								foreach($notas as $nota)
										         								{							         									
										         									if($nota->persona_aid == $persona->id)
										         									{
											         									$tipoNota = 'left';
											         									$alert = 'success';
										         									}
										         									else
										         									{
											         									$tipoNota = 'right';
											         									$alert = 'info';
										         									}
										         									
											         								$resumenNota = $resumenNota . 
										         									'<blockquote style="text-align:' . $tipoNota . '">'. 
										         										'<p class="text-warning">'.
										         											'<strong>'.$nota->persona->nombre . ' dice en: </strong>'.
										         										'<p/>'.
										         										'<strong>' . $nota->nombre . '</strong>' . 
										         										'<p> ' . $nota->descripcion . '</p>' .
										         										'<small>' . $nota->fecha . '</small>' .
										         									'</blockquote>';
										         								}
								         								
								         								 		echo $resumenNota;
								         								 	?> 
								         								 	<br/>
																		</div>  
																		<div class="modal-footer">  
																			<?php echo CHtml::link('<i class="icon-comment icon-white">
																			</i> Agregar Nota', 
																			array('nota/create', 'objetivo_did'=>$objetivo->id), 
																			array('class'=>'btn btn-success')); ?>
																			<a href="#" class="btn" data-dismiss="modal">Cerrar</a>  
																		</div>  
																	</div>
																	<?php
								         								echo CHtml::link($objetivo->descripcion . ' ', 
								         									array('objetivo/view', 'id'=>$objetivo->id));
																		if(count($notas)>0)
																		{																			
																			echo '<a data-toggle="modal" href="#nota-' . $objetivo->id .  
																				'" class="label label-success">Notas: ' . count($notas) . ' </a>';				
																		}
																	
																	?>
								         						</td>			         						
								         						<td class="hidden-phone hidden-tablet" style="width:200px;"><?php echo $objetivo->metaCuantitativa;?></td>
								         						<td class="hidden-phone hidden-tablet"><?php 
								         							if($objetivo->fechaCumplida!='0000-00-00')
								         							{
									         							$fecha = new DateTime($objetivo->fechaCumplida);
																		$fecha = $fecha->format('Y-m-d');
																		$hoy = new DateTime(date('Y-m-d'));
																		$hoy = $hoy->format('Y-m-d');
																		echo '<span class="label">' .
																				CHtml::encode($objetivo->fechaCumplida) . '</span>';
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
									         			<div style="height:100px;"></div>
												    </div>
<?php /* -------------------- Contenido de todas actividades  -----------------------*/ ?>
												    <div class="tab-pane" id="tab<?php echo $cadenaLimpia; ?>p3">
												      <?php $objetivosTodos = Objetivo::model()->findAll('objetivoGeneral_did = ' . $objGral->id . ' && responsable_aid = ' . $persona->id . ' || objetivoGeneral_did = ' . $objGral->id . ' && estatus_did != 3 && persona_aid = ' . $persona->id . '   ORDER BY numero ASC'); ?>
												      <table class="table table-striped" style="font-size:8pt;">
								         				<caption><h4>Listado de todos los objetivos</h4></caption>
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
								         						<td class="hidden-phone hidden-tablet"><strong>Capturado por</strong></td>
								         						<td class="hidden-phone"><strong>Estatus</strong></td>
								         					</tr>
								         				</thead>
								         				<tbody>
								         				<?php foreach($objetivosTodos as $objetivo){ ?>
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
																		echo '<span class="label">' .
																				CHtml::encode($objetivo->fechaCumplimiento) . '</span>';
								         							}
								         							else
								         							{
									         							//echo '<span style="width:20px;" class="label label-info">' . CHtml::encode('No existe') . '</span>';
								         							}
								         						?></td>
								         						<td class="hidden-phone"><?php if($objetivo->plazo->nombre != 'Ninguno') 
								         									echo $objetivo->plazo->nombre;
								         						?></td>
								         						<td class="hidden-phone"><?php echo $objetivo->responsable->nombre;?></td>
								         						<td style="font-size:9pt;">
								         							<?php 
								         								$notas = Nota::model()->findAll('objetivo_did = ' . $objetivo->id);
								         								$resumenNota = '';
								         							?>	
							         								<div id="nota-<?php echo $objetivo->id; ?>" 
							         													class="modal hide fade in" style="display: none; ">  
																		<div class="modal-header">  
																			<a class="close" data-dismiss="modal">×</a>  
																			<h3><?php echo $objetivo->descripcion; ?></h3>  
																		</div>  
																		<div class="modal-body" >
																			<?php
										         								foreach($notas as $nota)
										         								{							         									
										         									if($nota->persona_aid == $persona->id)
										         									{
											         									$tipoNota = 'left';
											         									$alert = 'success';
										         									}
										         									else
										         									{
											         									$tipoNota = 'right';
											         									$alert = 'info';
										         									}
										         									
											         								$resumenNota = $resumenNota . 
										         									'<blockquote style="text-align:' . $tipoNota . '">'. 
										         										'<p class="text-warning">'.
										         											'<strong>'.$nota->persona->nombre . ' dice en: </strong>'.
										         										'<p/>'.
										         										'<strong>' . $nota->nombre . '</strong>' . 
										         										'<p> ' . $nota->descripcion . '</p>' .
										         										'<small>' . $nota->fecha . '</small>' .
										         									'</blockquote>';
										         								}
								         								
								         								 		echo $resumenNota;
								         								 	?> 
								         								 	<br/>
																		</div>  
																		<div class="modal-footer">  
																			<?php echo CHtml::link('<i class="icon-comment icon-white">
																			</i> Agregar Nota', 
																			array('nota/create', 'objetivo_did'=>$objetivo->id), 
																			array('class'=>'btn btn-success')); ?>
																			<a href="#" class="btn" data-dismiss="modal">Cerrar</a>  
																		</div>  
																	</div>
																	<?php
								         								echo CHtml::link($objetivo->descripcion . ' ', 
								         									array('objetivo/view', 'id'=>$objetivo->id));
																		if(count($notas)>0)
																		{																			
																			echo '<a data-toggle="modal" href="#nota-' . $objetivo->id .  
																				'" class="label label-success">Notas: ' . count($notas) . ' </a>';				
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
																		echo '<span class="label">' .
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
									         			<div style="height:100px;"></div>
												    </div>												    
												  </div>												  
												</div>
							         		</div>
								  	<?php	
								  		$cogDesc++;
							  		}
							  	?>							    
							  </div>
							</div>					      	
					      </div>
					    </div>
					  </div>	
			<?php } 
			}
			else{
				echo 'No hay planeaciones';
			}
			?>	  
			<?php /* ------------------------------------------------ Proyectos Externos ------------------------------------------------------ */ ?>
			<br/>
			<div class="alert alert-info">		  
			  <h4>Otros Proyectos</h4>			  
			</div>
			<?php
				
				$contador = 0;			
				$departamentosExternos = Objetivo::model()->findAll(array(
												'select'=>'departamentoCreador_did',
												'distinct' => true,
												'condition' => 'departamentoCreador_did != ' . $persona->departamento_did . ' && 
																departamentoResponsable_did = ' . $persona->departamento_did . ' && 
																estatus_did = 1 && responsable_aid = ' . $persona->id . ';'));				
	      		if(!empty($departamentosExternos))
	      		{
		      		foreach($departamentosExternos as $departamentoExterno){
		      			$contador++;
		      			$objetivosExternos = Objetivo::model()->findAll('departamentoCreador_did = ' . $departamentoExterno->departamentoCreador_did . 
		      															' && departamentoResponsable_did = ' . $persona->departamento_did .
		      															' && estatus_did = 1 && responsable_aid = ' . $persona->id . ';');
		      	?>
						  <div class="accordion-group">
						    <div class="accordion-heading">					    	
						      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOE<?php echo $contador;?>">
						        <span class="badge badge-inverse"><?php echo count($objetivosExternos); ?></span>
						        <?php echo $departamentoExterno->departamentoCreador->nombre; ?>
						      </a>
						    </div>
						    <div id="collapseOE<?php echo $contador; ?>" class="accordion-body collapse">
						      <div class="accordion-inner">
			         			<table class="table table-striped" style="font-size:8pt;">
			         				<caption><h4>Listado de objetivos de otros proyectos</h4></caption>
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
																echo CHtml::link('<i class="icon-repeat"></i> Actualizar', array('objetivo/update','id'=>$objetivoExterno->id, 'objetivoGeneral_did'=>$objetivoExterno->objetivoGeneral_did));
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
			         							if($objetivoExterno['fechaCumplimiento']!='0000-00-00')
			         							{
				         							$fecha = new DateTime($objetivoExterno['fechaCumplimiento']);
													$fecha = $fecha->format('Y-m-d');
													$hoy = new DateTime(date('Y-m-d'));
													$hoy = $hoy->format('Y-m-d');
													
				         							if($fecha==$hoy)
														echo '<span class="label label-warning">' .
															CHtml::encode($objetivoExterno['fechaCumplimiento']) . '</span>';
													else if($fecha<=$hoy)
														echo '<span class="label label-important">' . 
															CHtml::encode($objetivoExterno['fechaCumplimiento']) . '</span>';
													else
														echo '<span class="label label-success">' . 
															CHtml::encode($objetivoExterno['fechaCumplimiento']) . '</span>';
			         							}
			         						?></td>
			         						<td class="hidden-phone"><?php if($objetivoExterno['plazo']->nombre != 'Ninguno') 
			         									echo $objetivoExterno->plazo->nombre;
			         						?></td>
			         						<td class="hidden-phone"><?php echo $objetivoExterno->responsable->nombre;?></td>
			         						<td style="font-size:9pt;">
				         							<?php 
				         								$notas = Nota::model()->findAll('objetivo_did = ' . $objetivoExterno['id']);
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
			         			<div style="height:90px;"></div>
						      </div>
						    </div>
						  </div>	
				<?php } 
				}
				else{
					echo 'No hay actividades pendientes con otros departamentos';
				}
			?>		
		</div>
    </div>
    <div class="tab-pane" id="tab2">
      <p>A continuación se mostrarán los activos que tienes asignados.</p>
<?php   $connection = Yii::app()->db;
		$query = 'select a.id, ta.nombre as TipoActivo, m.nombre as Marca, a.descripcion as Descripcion, a.numeroSerie as NumeroSerie, 
					a.fecha_f as Fecha, a.aceptado as Aceptado,
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
						<td><?php echo $activo['id'];  			?></td>
						<td><?php echo $activo['TipoActivo'];  	?></td>
						<td><?php echo $activo['Marca']; 		?></td>
						<td><?php echo $activo['Descripcion']; 	?></td>
						<td><?php echo $activo['NumeroSerie']; 	?></td>
						<td><?php echo $activo['Fecha']; 		?></td>
						<td><?php echo $activo['Categoria']; 	?></td>
						<td><?php echo $activo['Precio']; 		?></td>
						<td><?php echo $activo['EstadoActivo']; ?></td>
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
    <?php /* ------------------------------------------------ Mi Corcho ------------------------------------------------------ */ ?>
    <div class="tab-pane" id="tab3">
    	<div class="row">
    		<div class="span12" style="text-align:center;">
    			
    			<?php
    				$tipoPostits = TipoPostit::model()->findAll();
    				foreach($tipoPostits as $tipoPostit)
    				{
	    				echo CHtml::button($tipoPostit->nombre, array('submit' => array('postit/create', 'tipoPostit'=> $tipoPostit->id, 'pid'=> $persona->id), 'style'=> $tipoPostit->estilo, 'class'=>'tipoPostit'));
    				}
    			?>
       		</div>
    	</div>
    	<div class="row">
	    	<div class="span12">
	    		<div class="span11" style="border: 20px ridge #cccccc; 
			    					background-image:url('<?php echo Yii::app()->request->baseUrl . '/images/corcho.jpg';?>');
			    					background-repeat:repeat;">    			
    			<?php
    				
    				$contadorPostits = 0;
    				foreach($postits as $postit)
    				{
	    				if($postit->estatus_did != 3)
	    				{
    				?>
    					<div class="postit" style="<?php echo $postit->tipoPostit->estilo;?>">
    						<div id="titulo">
    							<?php
    								if($postit->estatus_did == 1) 
    									echo CHtml::link('<i class="icon-check"></i>',array('postit/cambiarestatus',
                                         'id'=> $postit->id )) . '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp';
                                    else
                                    	echo CHtml::link('<i class="icon-remove"></i>',array('postit/cambiarestatus',
                                         'estatus'=>'1')) . '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp';
                                    
                                    echo CHtml::link('<i class="icon-file"></i>',array('postit/view',
                                         'id'=> $postit->id)) . '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp';
    							
                                    echo CHtml::link('<i class="icon-trash"></i>',array('postit/archivar',
                                         'id'=> $postit->id)) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    							?>
    							<img src="<?php echo Yii::app()->request->baseUrl . '/images/chincheta.png';?>" style="margin-top:-15px; margin-left:20px;" />
    						</div>
    						<div id="cuerpo">
    							<?php echo substr($postit->nombre, 0, 130) . '...'; ?>
    						</div>
    						<div id="pie">
    							<span class="label label-inverse" style="max-height: 120px; font-size:8pt; margin-top:20px; margin-left:50px;">
	    							<?php echo $postit->personaRemitente->nombre; ?>
	    						</span>
    						</div>
	    				</div>
	    		<?php
	    				}
    				}
    			?>
    			</div> <?php /* ------------ Aquí termina el corcho ---------- */ ?>
	    	</div> <?php /* ------------ Aquí termina span 12 ---------- */ ?>
    	</div>	<?php /* ------------ Aquí termina el row ---------- */ ?>
    	<div class="row">
    		<div class="span12">
    			<div id="modalPostit" class="modal hide fade in" style="display: none; ">  
					<div class="modal-header" style="text-align:center;">  
						<a class="close" data-dismiss="modal">×</a>  						
						<img src="http://us.123rf.com/400wm/400/400/antonbrand/antonbrand1203/antonbrand120300003/12595683-el-hombre-en-busca-de-profundidad-en-un-cubo-de-basura-aislado.jpg" width="100" height="200"></img>
					</div>  
					<div class="modal-body">
	               		<table class="table table-striped">	               			
	               			<thead class="thead">
	               				<tr>
	               					<td style="width:50px;"><strong>Tipo</strong></td>
	               					<td style="width:100px;"><strong>Mensaje</strong></td>
	               					<td style="width:50px;"><strong>Recoger</strong></td>
	               				</tr>
	               			</thead>
	               			<tbody>
	               			<?php 
	               				foreach($postits as $postit)
	               				{ 
		               				if($postit->estatus_did == 3)
		               				{
			               	?>
			               				<tr>
			               					<td><?php echo $postit->tipoPostit->nombre;?></td>	
			               					<td><?php echo $postit->nombre;?></td>	
			               					<td style="width:50px; text-align:center;"><?php echo CHtml::link('<span class="label label-success"><i class="icon-share icon-white"></i></span>', array('postit/cambiarestatus', 'id'=>$postit->id));?>
			               					</td>				
			               				</tr>
			               	<?php
		               				}
		               			}
	               			?>
	               			</tbody>
	               		</table>
					</div>  
					<div class="modal-footer">  
						<a href="#" class="btn btn-success" data-dismiss="modal">Aceptar</a>  
					</div>  
				</div> 
	    		<div class="span2 offset9" style="text-align:center">	       			
	       			<a data-toggle="modal" href="#modalPostit">
		       			<img src="<?php echo Yii::app()->request->baseUrl . '/images/basura.jpg';?>" style="width: 150px; height:150px;" />
	       			</a>
	    		</div>
    		</div>
    	</div>
    </div>
    
  </div>
</div>
<script>  
	$(function ()  
	{ 
		$(".objGral").popover({title: 'Notas', content: "Contenido"});  
		$(".nota").popover({title: 'Notas', content: "Contenido"});
	});  
</script> 