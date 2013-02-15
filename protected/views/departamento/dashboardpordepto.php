<?php
	$depto = Departamento::model()->find('nombre = "' . $_GET['depto'] . '"');
	
	$this->pageCaption=$depto->nombre;
	$this->pageTitle=$this->pageCaption;
	$this->pageDescription='';
	$this->breadcrumbs=array(
		'Dashboard',
	);	
	
	$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
	
	
$connection = Yii::app()->db;
$queryObjetivos = 'select og.numero as objetivogeneral, ((100*sum(o.estatus_did = 2))/count(*)) as porcentaje from Objetivo o
join ObjetivoGeneral og on og.id = o.objetivoGeneral_did
where o.departamentoResponsable_did = ' . $depto->id . '
group by og.numero;';
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
			echo 'data.addRows([["' . $valor['objetivogeneral'] . '",' . $valor['porcentaje'] . ']]);';
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
		var chart = new google.visualization.ColumnChart(document.getElementById("objetivosGenerales"));
		
		function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);            
           	window.location = "http://administracion.uss.mx/index.php/objetivoGeneral/dashboardporobjetivogeneral?og=" + topping;
          }
        }
        
        google.visualization.events.addListener(chart, "select", selectHandler);

		chart.draw(data, options);
    }
    </script>';

$queryObjetivos = 'select p.nombre as persona, count(*) as cantidad from Objetivo o
					inner join Persona p on p.id = o.responsable_aid
					where o.estatus_did = 2 && o.departamentoResponsable_did = ' . $depto->id . '
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
    
    
$queryAvanceObjetivosPorDepartamento = 'select p.nombre as nombre, ((100*sum(o.estatus_did = 2))/count(*)) as porcentaje from Objetivo o
join Persona p on p.id = o.responsable_aid
where o.departamentoResponsable_did = ' . $depto->id . '
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
		data.addColumn("number", "% de objetivos");';
		foreach($avanceObjetivosPorDepartamento as $valor){
			echo 'data.addRows([["' . $valor['nombre'] . '",' . $valor['porcentaje'] . ']]);';
		}

		echo '
		// Set chart options
		var options = {
			"title":"Porcentaje de objetivos específicos completados por colaborador",
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
		var chart = new google.visualization.ColumnChart(document.getElementById("porcentajeObjetivosEspecificosPorColaboradorPorDepartamento"));
        
		chart.draw(data, options);
    }
    </script>';
?>


<div class="container">
	<div class="row">
		<div class="span2"></div>
		<div class="span8">
			<div id="objetivosGenerales"></div>
		</div>
		<div class="span2"></div>
	</div>
	<div class="row">
		<div class="span6">
			<div id="objetivosHechos"></div>
		</div>
		<div class="span6">
			<div id="porcentajeObjetivosEspecificosPorColaboradorPorDepartamento"></div>
		</div>
	</div>
</div>