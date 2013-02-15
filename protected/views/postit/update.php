<?php
$this->pageCaption='Actualizar Postit '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Postit'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Postit', 'url'=>array('index')),
	array('label'=>'Crear Postit', 'url'=>array('create')),
	array('label'=>'Ver Postit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Postit', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>