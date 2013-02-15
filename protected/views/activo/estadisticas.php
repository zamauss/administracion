<?php
$this->pageCaption='Estadísticas Generales';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";
$this->breadcrumbs=array(
	'Mis Estadísticas',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>


<div class="tabbable tabs-left">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Activos * Persona</a></li>
    <li><a href="#tab2" data-toggle="tab">Activos * Departamento</a></li>
    <li><a href="#tab3" data-toggle="tab">Activos * Tipo</a></li>
    <li><a href="#tab4" data-toggle="tab">Activos * Categoría</a></li>
    <li><a href="#tab5" data-toggle="tab">Articulos * Empleado</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
    	<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul class="nav nav-tabs">
		    <li class="active"><a href="#tab11" data-toggle="tab">Tablas</a></li>
		    <li><a href="#tab12" data-toggle="tab">Gráficos</a></li>
		  </ul>
		  <div class="tab-content">
		    <div class="tab-pane active" id="tab11">
		      	<?php
					//Materias por maestro
					$connection = Yii::app()->db;
					$queryActivosPorPersona = 'select distinct(p.nombre), p.id as id,
												d.nombre as departamento, 
												(select sum(cantidad) from Activo a where a.persona_aid = p.id) as cantidad
												from Activo a
												inner join Persona p on a.persona_aid = p.id
												inner join Departamento d on p.departamento_did = d.id
												order by p.nombre asc';
					
					$commandActivosPorPersona = $connection->createCommand($queryActivosPorPersona);
					$activosPorPersona = $commandActivosPorPersona->queryAll();
				?>
				<div class="alert alert-success"  style="text-align:center">
				  <b>Activos</b> por Persona
				</div>
			    <table class="table table-bordered">
				    <thead>
						<tr>		
							<td><b>Nombre</b></td>
							<td><b>Departamento</b></td>
							<td style="width:70px;"><b># Activos</b></td>		
						</tr>
				    </thead>
				    <tbody>
					<?php foreach($activosPorPersona as $activoPersona) { ?>
						<tr>
							<td><?php echo CHtml::link($activoPersona['nombre'],array('/persona/view', 'id'=>$activoPersona['id'])); ?></td>			
							<td><?php echo $activoPersona['departamento']; ?></td>
							<td><?php echo $activoPersona['cantidad']; ?></td>			
						</tr>
					<?php } ?>
				    </tbody>
				</table>
		    </div>
		    <div class="tab-pane" id="tab12">		    	
		      <?php
		      	
		      	//Gráfica de Prospectos por Etapa Ventas Columnas
					echo '<script type="text/javascript">
							// Load the Visualization API and the piechart package.
							google.load("visualization", "1.0", {"packages":["corechart"]});
					
							// Set a callback to run when the Google Visualization API is loaded.
							google.setOnLoadCallback(drawChart);
					
							// Callback that creates and populates a data table, 
							// instantiates the pie chart, passes in the data and
							// draws it.
							function drawChart() {
					
							// Create the data table.
							var data = new google.visualization.DataTable();
							data.addColumn("string", "Departamento");
							data.addColumn("number", "Cantidad");';
							foreach($activosPorPersona as $valor){
								echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
							}
					
							echo '
							// Set chart options
							var options = {
								"title":"Activos designados por Departamento",
								"width":900,
								"height":900,
								hAxis: {title: ""},
								vAxis: {title: ""},
								legend: "none",
								colors:["#8dc640"],
							};
					
							// Instantiate and draw our chart, passing in some options.
							var chart = new google.visualization.BarChart(document.getElementById("activosPorPersona"));
							chart.draw(data, options);
					    }
					    </script>';  
				
		      ?>
		      <div id="activosPorPersona" style="width:100%; height:300; float:left;"></div>
		    </div>
		</div>    	
    	</div>
    </div>
	<div class="tab-pane" id="tab2">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab21" data-toggle="tab">Tablas</a></li>
				<li><a href="#tab22" data-toggle="tab">Gráficos</a></li>
			</ul>
			<div class="tab-content">
				<?php
				
					//Obtener Activos por Departamento
					$connection = Yii::app()->db;
					$queryActivosPorDepto = 'select d.nombre, sum(cantidad) as cantidad from Activo a
												inner join Persona p on p.id = a.persona_aid
												inner join Departamento d on d.id = p.departamento_did
												group by d.nombre
												order by p.id asc;';
					
					$commandActivosPorDepto = $connection->createCommand($queryActivosPorDepto);
					$activosPorDepto = $commandActivosPorDepto->queryAll();
					
					//Obtener Costos por Departamento
					$connection = Yii::app()->db;
					$queryCostosPorDepto = 'select d.nombre, sum(a.precio) as cantidad from Activo a
												inner join Persona p on p.id = a.persona_aid
												inner join Departamento d on d.id = p.departamento_did
												group by d.nombre
												order by p.id asc;';
					
					$commandCostosPorDepto = $connection->createCommand($queryCostosPorDepto);
					$costosPorDepto = $commandCostosPorDepto->queryAll();				
				?>
				
				<div class="tab-pane active" id="tab21">
					<div class="alert alert-success"  style="text-align:center">
					  <b>Activos</b> designados por Departamento
					</div>
				    <table id="activoPorDepto" class="table table-bordered">
						<tr>		
							<td><b>Nombre</b></td>
							<td style="width:70px;"><b># Activos</b></td>		
						</tr>
						<?php $cantDeptos = 0;
						foreach($activosPorDepto as $activoDepto) { ?>
							<tr>
								<td><?php echo $activoDepto['nombre']; ?></td>
								<td><?php echo $activoDepto['cantidad']; ?></td>			
							</tr>
						<?php $cantDeptos += $activoDepto['cantidad'];
						} ?>
							<tr>
								<td><b>Total</b></td>
								<td><?php echo $cantDeptos; ?></td>			
							</tr>
					</table>
					<div class="alert alert-success" style="text-align:center">
					  <b>Costos</b> designados por Departamento
					</div>
				    <table id="activoPorDepto" class="table table-bordered">
						<tr>		
							<td><b>Nombre</b></td>
							<td style="width:70px;"><b>$ Activos</b></td>		
						</tr>
						<?php $costoDeptos = 0;
						foreach($costosPorDepto as $costosDepto) { ?>
							<tr>
								<td><?php echo $costosDepto['nombre']; ?></td>
								<td><?php echo '$' . $costosDepto['cantidad']; ?></td>			
							</tr>
						<?php $costoDeptos += $costosDepto['cantidad'];
						} ?>
							<tr>
								<td><b>Total</b></td>
								<td><?php echo '$' . $costoDeptos; ?></td>			
							</tr>
					</table>
				</div>
				
					
				<div class="tab-pane" id="tab22">
					<?php
						//Gráfica de Activos por Departamento Columnas
						echo '<script type="text/javascript">
								google.load("visualization", "1.0", {"packages":["corechart"]});
								google.setOnLoadCallback(drawChart);
								function drawChart() {
									var data = new google.visualization.DataTable();
									data.addColumn("string", "Departamento");
									data.addColumn("number", "Cantidad");';
									foreach($activosPorDepto as $valor){
										echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
									}
							
									echo '
									var options = {
										"title":"Activos designados por Departamento",
										"width":900,
										"height":600,
										hAxis: {title: "Departamentos"},
										vAxis: {title: ""},
										legend: "none",
										colors:["#492D17"],
									};
			
									var chart = new google.visualization.BarChart(document.getElementById("activosPorDepto"));
									chart.draw(data, options);
							    }
						    </script>';
												
						//Gráfica de Costos por Departamento Columnas
						echo '<script type="text/javascript">
								google.load("visualization", "1.0", {"packages":["corechart"]});
								google.setOnLoadCallback(drawChart);
								function drawChart() {
									var data = new google.visualization.DataTable();
									data.addColumn("string", "Departamento");
									data.addColumn("number", "Cantidad");';
									foreach($costosPorDepto as $valor){
										echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
									}
							
									echo '
									var options = {
										"title":"Costos designados por Departamento",
										"width":400,
										"height":300,
										hAxis: {title: "Departamentos"},
										vAxis: {title: "Cantidad en pesos"},
										legend: "none",
										colors:["#8dc640"],
									};
				
									var chart = new google.visualization.ColumnChart(document.getElementById("costosPorDepto"));
									chart.draw(data, options);
							    }
						    </script>';
			
					?>
					<div id="activosPorDepto" style="width:400; height:300; float:left;"></div>
					<div id="costosPorDepto" style="width:400; height:300; float:left;"></div>
				</div>
			</div>  
		</div>
	</div>
    <div class="tab-pane" id="tab3">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab31" data-toggle="tab">Tablas</a></li>
				<li><a href="#tab32" data-toggle="tab">Gráficos</a></li>
			</ul>
			<div class="tab-content">
				<?php
				
					//Obtener Activos por Departamento
					$connection = Yii::app()->db;
					$queryActivosPorTipo = 'select ta.nombre, count(a.id) as cantidad from Activo a
												inner join Persona p on p.id = a.persona_aid
												inner join TipoActivo ta on ta.id = a.tipoActivo_did
												group by ta.nombre
												order by p.id asc;';
					
					$commandActivosPorTipo = $connection->createCommand($queryActivosPorTipo);
					$activosPorTipo = $commandActivosPorTipo->queryAll();
					
					//Obtener Costos por Departamento
					$connection = Yii::app()->db;
					$queryCostosPorTipo = 'select ta.nombre, sum(a.precio) as cantidad from Activo a
												inner join Persona p on p.id = a.persona_aid
												inner join TipoActivo ta on ta.id = a.tipoActivo_did
												group by ta.nombre
												order by p.id asc;';
					
					$commandCostosPorTipo = $connection->createCommand($queryCostosPorTipo);
					$costosPorTipo = $commandCostosPorTipo->queryAll();				
				?>
				
				<div class="tab-pane active" id="tab31">
					<div class="alert alert-success"  style="text-align:center">
					  <b>Activos</b> por Tipo
					</div>
				    <table id="activoPorDepto" class="table table-bordered">
						<tr>		
							<td><b>Nombre</b></td>
							<td style="width:70px;"><b># Activos</b></td>		
						</tr>
						<?php $cantTipo = 0;
						foreach($activosPorTipo as $activoTipo) { ?>
							<tr>
								<td><?php echo $activoTipo['nombre']; ?></td>
								<td><?php echo $activoTipo['cantidad']; ?></td>			
							</tr>
						<?php $cantTipo = $activoTipo['cantidad'];
						} ?>
							<tr>
								<td><b>Total</b></td>
								<td><?php echo $cantTipo; ?></td>			
							</tr>
					</table>
					<div class="alert alert-success" style="text-align:center">
					  <b>Costos</b> por Tipo
					</div>
				    <table id="activoPorDepto" class="table table-bordered">
						<tr>		
							<td><b>Nombre</b></td>
							<td style="width:70px;"><b>$ Activos</b></td>		
						</tr>
						<?php $costoTipo = 0;
						foreach($costosPorTipo as $costosTipo) { ?>
							<tr>
								<td><?php echo $costosTipo['nombre']; ?></td>
								<td><?php echo '$' . $costosTipo['cantidad']; ?></td>			
							</tr>
						<?php $costoTipo = '$' . $costosTipo['cantidad'];
						} ?>
							<tr>
								<td><b>Total</b></td>
								<td><?php echo $costoTipo; ?></td>			
							</tr>
					</table>
				</div>
				
					
				<div class="tab-pane" id="tab32">
					<?php
						//Gráfica de Activos por Tipo Columnas
						echo '<script type="text/javascript">
								google.load("visualization", "1.0", {"packages":["corechart"]});
								google.setOnLoadCallback(drawChart);
								function drawChart() {
									var data = new google.visualization.DataTable();
									data.addColumn("string", "Departamento");
									data.addColumn("number", "Cantidad");';
									foreach($activosPorTipo as $valor){
										echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
									}
							
									echo '
									var options = {
										"title":"Activos designados por Departamento",
										"width":400,
										"height":300,
										hAxis: {title: "Departamentos"},
										vAxis: {title: "Cantidad de Activos"},
										legend: "none",
										colors:["#492D17"],
									};
			
									var chart = new google.visualization.ColumnChart(document.getElementById("activosPorTipo"));
									chart.draw(data, options);
							    }
						    </script>';
												
						//Gráfica de Costos por Tipo Columnas
						echo '<script type="text/javascript">
								google.load("visualization", "1.0", {"packages":["corechart"]});
								google.setOnLoadCallback(drawChart);
								function drawChart() {
									var data = new google.visualization.DataTable();
									data.addColumn("string", "Departamento");
									data.addColumn("number", "Cantidad");';
									foreach($costosPorTipo as $valor){
										echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
									}
							
									echo '
									var options = {
										"title":"Costos designados por Departamento",
										"width":400,
										"height":300,
										hAxis: {title: "Departamentos"},
										vAxis: {title: ""},
										legend: "none",
										colors:["#8dc640"],
									};
				
									var chart = new google.visualization.ColumnChart(document.getElementById("costosPorTipo"));
									chart.draw(data, options);
							    }
						    </script>';
			
					?>
					<div id="activosPorTipo" style="width:400; height:300; float:left;"></div>
					<div id="costosPorTipo" style="width:400; height:300; float:left;"></div>
				</div><!-- Se cierra el tab interno -->
			</div>
		</div>		
    </div><!-- Se cierra el tab principal -->
    <div class="tab-pane" id="tab4">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab41" data-toggle="tab">Tablas</a></li>
				<li><a href="#tab42" data-toggle="tab">Gráficos</a></li>
			</ul>
			<div class="tab-content">
				<?php
				
					//Obtener Activos por Departamento
					$connection = Yii::app()->db;
					$queryActivosPorCategoria = 'select ca.nombre, count(a.id) as cantidad from Activo a
												inner join Persona p on p.id = a.persona_aid
												inner join CategoriaActivo ca on ca.id = a.categoriaActivo_did
												group by ca.nombre
												order by p.id asc;';
					
					$commandActivosPorCategoria = $connection->createCommand($queryActivosPorCategoria);
					$activosPorCategoria = $commandActivosPorCategoria->queryAll();
					
					//Obtener Costos por Departamento
					$connection = Yii::app()->db;
					$queryCostosPorCategoria = 'select ca.nombre, sum(a.precio) as cantidad from Activo a
												inner join Persona p on p.id = a.persona_aid
												inner join CategoriaActivo ca on ca.id = a.categoriaActivo_did
												group by ca.nombre
												order by p.id asc;';
					
					$commandCostosPorCategoria = $connection->createCommand($queryCostosPorCategoria);
					$costosPorCategoria = $commandCostosPorCategoria->queryAll();				
				?>
				
				<div class="tab-pane active" id="tab41">
					<div class="alert alert-success"  style="text-align:center">
					  <b>Activos</b> por Categoría
					</div>
				    <table id="activoPorDepto" class="table table-bordered">
						<tr>		
							<td><b>Nombre</b></td>
							<td style="width:70px;"><b># Activos</b></td>		
						</tr>
						<?php foreach($activosPorCategoria as $activoCategoria) { ?>
							<tr>
								<td><?php echo $activoCategoria['nombre']; ?></td>
								<td><?php echo $activoCategoria['cantidad']; ?></td>			
							</tr>
						<?php } ?>
					</table>
					<div class="alert alert-success" style="text-align:center">
					  <b>Costos</b> por Categoría
					</div>
				    <table id="activoPorDepto" class="table table-bordered">
						<tr>		
							<td><b>Nombre</b></td>
							<td style="width:70px;"><b>$ Activos</b></td>		
						</tr>
						<?php foreach($costosPorCategoria as $costosCategoria) { ?>
							<tr>
								<td><?php echo $costosCategoria['nombre']; ?></td>
								<td><?php echo '$' . $costosCategoria['cantidad']; ?></td>			
							</tr>
						<?php } ?>
					</table>
				</div>
				
					
				<div class="tab-pane" id="tab42">
					<?php
						//Gráfica de Activos por Tipo Columnas
						echo '<script type="text/javascript">
								google.load("visualization", "1.0", {"packages":["corechart"]});
								google.setOnLoadCallback(drawChart);
								function drawChart() {
									var data = new google.visualization.DataTable();
									data.addColumn("string", "Departamento");
									data.addColumn("number", "Cantidad");';
									foreach($activosPorCategoria as $valor){
										echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
									}
							
									echo '
									var options = {
										"title":"Activos designados por Departamento",
										"width":800,
										"height":600,
										hAxis: {title: "Categorías"},
										vAxis: {title: ""},
										legend: "none",
										colors:["#492D17"],
									};
			
									var chart = new google.visualization.BarChart(document.getElementById("activosPorCategoria"));
									chart.draw(data, options);
							    }
						    </script>';
												
						//Gráfica de Costos por Tipo Columnas
						echo '<script type="text/javascript">
								google.load("visualization", "1.0", {"packages":["corechart"]});
								google.setOnLoadCallback(drawChart);
								function drawChart() {
									var data = new google.visualization.DataTable();
									data.addColumn("string", "Categorías");
									data.addColumn("number", "Cantidad");';
									foreach($costosPorCategoria as $valor){
										echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['cantidad'] . ']]);';
									}
							
									echo '
									var options = {
										"title":"Costos designados por Departamento",
										"width":400,
										"height":300,
										hAxis: {title: "Categorías"},
										vAxis: {title: "Cantidad en pesos"},
										legend: "none",
										colors:["#8dc640"],
									};
				
									var chart = new google.visualization.ColumnChart(document.getElementById("costosPorCategoria"));
									chart.draw(data, options);
							    }
						    </script>';
					?>
					<div id="activosPorCategoria" style="width:400; height:300; float:left;"></div>
					<div id="costosPorCategoria" style="width:400; height:300; float:left;"></div>
				</div>
			</div>
		</div>
		</div>
		<div class="tab-pane" id="tab5">
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab51" data-toggle="tab">Tablas</a></li>
				</ul>
				<div class="tab-content">
					<?php
					
						//Obtener Activos por Departamento
						$connection = Yii::app()->db;
						$queryDetallePorPersona = 'select p.nombre, a.descripcion from Activo a
													inner join Persona p on p.id = a.persona_aid
													order by p.nombre asc';
						
						$commandDetallePorPersona= $connection->createCommand($queryDetallePorPersona);
						$detallePorPersona= $commandDetallePorPersona->queryAll();
						
						//Obtener Costos por Departamento
						$connection = Yii::app()->db;
						$queryCostosPorCategoria = 'select ca.nombre, sum(a.precio) as cantidad from Activo a
													inner join Persona p on p.id = a.persona_aid
													inner join CategoriaActivo ca on ca.id = a.categoriaActivo_did
													group by ca.nombre
													order by p.id asc;';
						
						$commandCostosPorCategoria = $connection->createCommand($queryCostosPorCategoria);
						$costosPorCategoria = $commandCostosPorCategoria->queryAll();				
					?>
					
					<div class="tab-pane active" id="tab51">
						<div class="alert alert-success"  style="text-align:center">
						  <b>Detalle</b> por Persona
						</div>
					    <table id="activoPorDepto" class="table table-bordered">
							<tr>		
								<td><b>Nombre</b></td>
								<td><b># Activos</b></td>		
							</tr>
							<?php foreach($detallePorPersona as $detallePersona) { ?>
								<tr>
									<td><?php echo $detallePersona['nombre']; ?></td>
									<td><?php echo $detallePersona['descripcion']; ?></td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	
</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
		