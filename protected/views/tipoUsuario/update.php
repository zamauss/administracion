<?php
$this->pageCaption='Actualizar TipoUsuario '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tipo Usuario'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo Usuario', 'url'=>array('index')),
	array('label'=>'Crear TipoUsuario', 'url'=>array('create')),
	array('label'=>'Ver TipoUsuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipo Usuario', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>