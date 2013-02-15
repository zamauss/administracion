<?php
$this->pageCaption='Actualizar EstadoActivo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Estado Activo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Estado Activo', 'url'=>array('index')),
	array('label'=>'Crear EstadoActivo', 'url'=>array('create')),
	array('label'=>'Ver EstadoActivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Estado Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>