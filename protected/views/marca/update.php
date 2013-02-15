<?php
$this->pageCaption='Actualizar Marca '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Marca'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Marca', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Ver Marca', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Marca', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>