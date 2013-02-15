<?php
$objetivo = Objetivo::model()->find('id = ' . $_GET['objetivo_did']);
$this->pageCaption='Crear Nota para el objetivo: ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription= $objetivo->descripcion;
$this->breadcrumbs=array(
	'Nota'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>