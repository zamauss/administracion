<?php
$planeacion = Planeacion::model()->find('id = ' . $_GET['planeacion_did']);
$this->pageCaption='Crear Objetivo General para: ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription=$planeacion->nombre;
$this->breadcrumbs=array(
	'Objetivo General'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'volver', 'url'=>array('site/index')),
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>