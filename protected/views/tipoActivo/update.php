<?php
$this->pageCaption='Actualizar TipoActivo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tipo Activo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo Activo', 'url'=>array('index')),
	array('label'=>'Crear TipoActivo', 'url'=>array('create')),
	array('label'=>'Ver TipoActivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipo Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>