<?php
$this->pageCaption='Create TipoPostit';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo tipopostit';
$this->breadcrumbs=array(
	'Tipo Postit'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo Postit', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Postit', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>