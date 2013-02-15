<?php
	$this->pageCaption='Cuadro de mando';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='para proyectos USS';
	$this->breadcrumbs=array(
		'Dashboard',
	);	

$connection = Yii::app()->db;
$queryObjetivos = 'select p.nombre as persona, count(*) as cantidad from Objetivo o
					inner join Persona p on p.id = o.responsable_aid
					where o.estatus_did = 1
					group by p.nombre;';
$commandObjetivos = $connection->createCommand($queryObjetivos);
$objetivos = $commandObjetivos->queryAll();

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
		foreach($objetivos as $valor){
			echo 'data.addRows([["' . $valor['persona'] . '",' . $valor['cantidad'] . ']]);';
		}

		echo '
		// Set chart options
		var options = {
			"title":"Objetivos pendientes por colaborador",
			"width":450,
			"height":300,
			hAxis: {title: "Colaboradores"},
			vAxis: {title: "Cant. Objetivos"},
			legend: "none",
			colors:["#8dc640"],
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.ColumnChart(document.getElementById("objetivosPendientes"));
		chart.draw(data, options);
    }
    </script>';

$queryObjetivos = 'select p.nombre as persona, count(*) as cantidad from Objetivo o
					inner join Persona p on p.id = o.responsable_aid
					where o.estatus_did = 2
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
			"title":"Objetivos realizados por colaborador",
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
    
    
$queryAvanceObjetivosPorDepartamento = 'select d.nombre as departamento, ((100*sum(estatus_did = 2))/count(*)) as porcentaje from Objetivo o
join Departamento d on d.id = o.departamentoResponsable_did
group by d.nombre;';
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
		data.addColumn("number", "% de Objetivos");';
		foreach($avanceObjetivosPorDepartamento as $valor){
			echo 'data.addRows([["' . $valor['departamento'] . '",' . $valor['porcentaje'] . ']]);';
		}

		echo '
		// Set chart options
		var options = {
			"title":"Avance por departamento",
			"width":800,
			"height":600,
			hAxis: 
			{
				title: "Departamentos",
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
		var chart = new google.visualization.ColumnChart(document.getElementById("avanceObjetivosPorDepartamento"));
		
		function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);            
           	window.location = "http://administracion.uss.mx/index.php/departamento/dashboardpordepto?depto=" + topping;
          }
        }

        google.visualization.events.addListener(chart, "select", selectHandler); 
        
		chart.draw(data, options);
    }
    </script>';
?>

<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<div class="container">
		<h2>Información de todos los departamentos<?php echo $descripcion;?></h2>
		<div class="row">
			<div class="span2 offset"></div>
			<div class="span8">
				<div id="avanceObjetivosPorDepartamento" style="width:800; height:600;"></div>
			</div>
			<div class="span2 offset"></div>
		</div>
		<div class="row">
			<div class="span6">
				<div id="objetivosPendientes" style="width:450; height:300;"></div>
			</div>
			<div class="span6">
				<div id="objetivosHechos" style="width:450; height:300;"></div>
			</div>
		</div>
	</div>
</body>
</html>