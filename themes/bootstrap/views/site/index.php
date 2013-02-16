<?php
$this->pageCaption='';
$this->pageTitle='Administración / Iniciar Sesión';
?>
<div class="hero-unit">
	<div>
		<h1>Bienvenido a Administración</h1>
	</div>
	<p>Aquí irá la información de introducción.</p>
	<div class="alert alert-success">
		<div style="text-align:center;">
			  <strong>Atrévete</strong> a descubrir tu verdadero potencial.
		</div>
	</div>	
    <?php echo CHtml::button('Iniciar Sesión', array('submit' => array('site/login'), 'class' => 'btn btn-success btn-large')); ?>
</div>
