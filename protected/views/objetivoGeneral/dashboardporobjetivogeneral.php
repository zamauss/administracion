<?php
	$og = ObjetivoGeneral::model()->find('numero = "' . $_GET['og'] . '"');
	
	$this->pageCaption= $og->numero . ': ' . $og->descripcion;
	$this->pageTitle=$this->pageCaption;
	$this->pageDescription='';
	$this->breadcrumbs=array(
		'Dashboard',
	);	
	
	$this->menu=array(
		array('label'=>'Inicio', 'url'=>array('site/index')),
		array('label'=>'Volver', 'url'=>array('departamento/dashboardpordepto?depto='.$og->departamento->nombre)),
	);
	
	
$connection = Yii::app()->db;
$queryObjetivos = 'select p.nombre as responsable, ((100*sum(o.estatus_did= 2))/count(*)) as porcentaje from Objetivo o
join Persona p on p.id = o.responsable_aid
where o.objetivoGeneral_did = ' . $og->id . '
 group by p.nombre;';
$commandObjetivos = $connection->createCommand($queryObjetivos);
$objetivos = $commandObjetivos->queryAll();

//Gráfica Objetivos Generales por Departamento
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
		data.addColumn("string", "Objetivos Generales");
		data.addColumn("number", "Objetivos");';
		foreach($objetivos as $valor){
			echo 'data.addRows([["' . $valor['responsable'] . '",' . $valor['porcentaje'] . ']]);';
		}

		echo '
		// Set chart options
		var options = {
			"title":"Porcentaje de cumplimiento de los objetivos generales",
			"width":800,
			"height":600,
			hAxis: {title: "Objetivos Generales"},
			vAxis: 
			{
				title: "Porcentaje",
				viewWindowMode: "explicit",
				viewWindow: 
				{
					max:100,
					min: 0,
		        },
				gridlines: 
				{
		          count: 11,
		        },			        
			},
			legend: "none",
			colors:["#8dc640"],
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.ColumnChart(document.getElementById("objetivos"));
		
		function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);            
           	window.location = "http://administracion.uss.mx/index.php/persona/dashboardporcolaborador?colaborador=" + topping + "&og=' . $og->numero . '";
          }
        }
        
        google.visualization.events.addListener(chart, "select", selectHandler);
        
		chart.draw(data, options);
    }
    </script>';

$queryObjetivos = 'select p.nombre as persona, count(*) as cantidad from Objetivo o
					inner join Persona p on p.id = o.responsable_aid
					where o.estatus_did = 2 && o.objetivoGeneral_did = ' . $og->id . '
					group by p.nombre;';
$commandObjetivos = $connection->createCommand($queryObjetivos);
$objetivos = $commandObjetivos->queryAll();

//Gráfica Objetivos por Colaborador
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
		data.addColumn("string", "Colaboradores");
		data.addColumn("number", "Objetivos");';
		foreach($objetivos as $valor){
			echo 'data.addRows([["' . $valor['persona'] . '",' . $valor['cantidad'] . ']]);';
		}

		echo '
		// Set chart options
		var options = {
			"title":"Objetivos específicos realizados por colaborador",
			"width":450,
			"height":300,
			hAxis: {title: "Colaboradores"},
			vAxis: 
			{
				title: "Cant. Objetivos",
				viewWindowMode: "explicit",
				viewWindow: 
				{					
					min: 0,
		        },	        
			},
			legend: "none",
			colors:["#8dc640"],
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.ColumnChart(document.getElementById("objetivosHechos"));
		chart.draw(data, options);
    }
    </script>';
    
    
$queryAvanceObjetivosPorDepartamento = 'select p.nombre as persona, count(*) as cantidad from Objetivo o
					inner join Persona p on p.id = o.responsable_aid
					where o.estatus_did = 1 && o.objetivoGeneral_did = ' . $og->id . '
					group by p.nombre;';
$commandAvanceObjetivosPorDepartamento = $connection->createCommand($queryAvanceObjetivosPorDepartamento);
$avanceObjetivosPorDepartamento = $commandAvanceObjetivosPorDepartamento->queryAll();

//Gráfica Objetivos Pendientes por Colaborador
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
		data.addColumn("string", "Colaboradores");
		data.addColumn("number", "Objetivos");';
		foreach($avanceObjetivosPorDepartamento as $valor){
			echo 'data.addRows([["' . $valor['persona'] . '",' . $valor['cantidad'] . ']]);';
		}

		echo '
		// Set chart options
		var options = {
			"title":"Objetivos específicos pendientes por colaborador",
			"width":450,
			"height":300,
			hAxis: 
			{
				title: "Colaboradores",
			},
			vAxis: 
			{
				title: "Porcentaje",
				viewWindowMode: "explicit",
				viewWindow: 
				{
					
					min: 0,
		        },			        
			},
			legend: "none",
			colors:["#8dc640"],
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.ColumnChart(document.getElementById("porcentajeObjetivosEspecificosPorColaborador"));
        
		chart.draw(data, options);
    }
    </script>';
?>


<div class="container">
	<div class="row">
		<div class="span2"></div>
		<div class="span8">
			<div id="objetivos"></div>
		</div>
		<div class="span2"></div>
	</div>
	<div class="row">
		<div class="span6">
			<div id="objetivosHechos"></div>
		</div>
		<div class="span6">
			<div id="porcentajeObjetivosEspecificosPorColaborador"></div>
		</div>
	</div>
</div>