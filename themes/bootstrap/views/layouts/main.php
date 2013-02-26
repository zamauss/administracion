<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
<![endif]-->
	<style>
		.navbar-inner{
			background: rgb(82,163,73); /* Old browsers */
			/* IE9 SVG, needs conditional override of 'filter' to 'none' */
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzUyYTM0OSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM1MmEzNDkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
			background: -moz-linear-gradient(top,  rgba(82,163,73,1) 0%, rgba(82,163,73,1) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(82,163,73,1)), color-stop(100%,rgba(82,163,73,1))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* IE10+ */
			background: linear-gradient(to bottom,  rgba(82,163,73,1) 0%,rgba(82,163,73,1) 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#52a349', endColorstr='#52a349',GradientType=0 ); /* IE6-8 */
		}
		.navbar .nav > li > a {
		  color:white;
		  float:none;
		  line-h	eight:19px;
		  padding:10px 10px 11px;
		  text-decoration:none;
		  text-shadow:rgba(0, 0, 0, 0.247059) 0 -1px 0;
		}
		
		.navbar .nav .active > a, .navbar .nav .active > a:hover {
		  background-color:#1c670d;
		  color:#e9d6d6;
		  text-decoration:none;
		}
		
		.thead{
			background: rgb(255,255,255); /* Old browsers */
			/* IE9 SVG, needs conditional override of 'filter' to 'none' */
			background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2YzZjNmMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUxJSIgc3RvcC1jb2xvcj0iI2VkZWRlZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
			background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 50%, rgba(237,237,237,1) 51%, rgba(255,255,255,1) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(50%,rgba(243,243,243,1)), color-stop(51%,rgba(237,237,237,1)), color-stop(100%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* IE10+ */
			background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-8 */
		}
	</style>
	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		        </a>
				<a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>" style="color:black;"><strong><?php echo CHtml::encode(Yii::app()->name); ?></strong></a>
				<div class="nav-collapse collapse">
		        
				<?php 
					$estrategias = Estrategia::model()->findAll();					
					$items = array();
					$usuarioActual = Usuario::model()->find('usuario=:x',array(':x'=>Yii::app()->user->name));
					//echo '<pre>'; print_r($usuarioActual); echo '</pre>';
					if(isset($usuarioActual) && $usuarioActual->tipousuario->nombre == 'Administrador')
					{
						$items=	array(
									array('label'=>'Inicio', 'url'=>array('site/index')),
									array('label'=>'Catálogos', 
										'url'=>'#',
										'itemOptions'=>array('class'=>'dropdown','id'=>'home'),
										'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
										'submenuOptions'=>array('class'=>'dropdown-menu'),
										'items'=>array(
											array('label'=>'Activos', 'url'=>array('/activo/index')),
											array('label'=>'Areas', 'url'=>array('/area/index')),
											array('label'=>'Categoría Activo', 'url'=>array('/categoriaActivo/index')),
											array('label'=>'Departamentos', 'url'=>array('/departamento/index')),
											array('label'=>'Estado del Activo', 'url'=>array('/estadoactivo/index')),
											array('label'=>'Estatus', 'url'=>array('/estatus/index')),
											array('label'=>'Marcas', 'url'=>array('/marca/index')),
											array('label'=>'Personas', 'url'=>array('/persona/index')),	
											array('label'=>'Tipo de Activos', 'url'=>array('/tipoActivo/index')),
											array('label'=>'Tipo de Usuario', 'url'=>array('/tipoUsuario/index')),									
											array('label'=>'Usuarios', 'url'=>array('/usuario/index')),										
											
										),
										'visible'=>!Yii::app()->user->isGuest
									),	
									array('label'=>'Estrategias', 'url'=>array('/estrategia/index')),
									array('label'=>'Misión', 'url'=>array('/site/mision')),
									array('label'=>'Vision', 'url'=>array('/site/vision')),						
								);
					}
					elseif(isset($usuarioActual) && $usuarioActual->tipousuario->nombre == 'Coordinador'){
						$items=array(
							array('label'=>'Principal', 'url'=>array('/site/index')),
							array('label'=>'Acciones', 
									'url'=>'#',
									'itemOptions'=>array('class'=>'dropdown','id'=>'home'),
									'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
									'submenuOptions'=>array('class'=>'dropdown-menu'),
									'items'=>array(
										array('label'=>'Agregar Planeación', 'url'=>array('/planeacion/create')),
									),
									'visible'=>!Yii::app()->user->isGuest
								),	
							array('label'=>'Estrategias', 'url'=>array('/estrategia/index')),
							array('label'=>'Misión', 'url'=>array('/site/mision')),
							array('label'=>'Vision', 'url'=>array('/site/vision')),							
						);
					}	
					elseif(isset($usuarioActual) && $usuarioActual->tipousuario->nombre == 'Usuario'){
						$items=array(
							array('label'=>'Principal', 'url'=>array('/site/index')),								
							array('label'=>'Estrategias', 'url'=>array('/estrategia/index')),
							array('label'=>'Misión', 'url'=>array('/site/mision')),
							array('label'=>'Vision', 'url'=>array('/site/vision')),
						);
					}					
					$items[]=array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);					
							
					$this->widget('ext.custom.widgets.BMenu',array(
						'items'=>$items,						 
						'htmlOptions'=>array(
							'class'=>'nav',
						),
					)); 
				?>

				<?php 
				//echo '<pre>'; print_r($usuarioActual->tipoUsuario); echo '</pre>';
				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Bienvenido ' . Yii::app()->user->name, 'url'=>array('usuario/miperfil' . $usuarioActual->id), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Cerrar Sesión', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
					),
					'htmlOptions'=>array(
						'class'=>'nav pull-right',
					),
				)); ?>
				<!-- .nav, .navbar-search, .navbar-form, etc -->
		      </div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('BBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
				'separator'=>' / ',
			)); ?>
		<?php endif?>
	</div>
	
	<?php echo $content; ?>
	
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; <?php echo date('Y'); ?> by <a href="http://uss.mx">USS</a>.<br/>
			Todos los derechos reservados.<br/>
		</div>
	</footer>
	
</body>
</html>
