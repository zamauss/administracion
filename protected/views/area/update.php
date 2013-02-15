<?php
$this->pageCaption='Actualizar Area '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Area'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Area', 'url'=>array('index')),
	array('label'=>'Crear Area', 'url'=>array('create')),
	array('label'=>'Ver Area', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Area', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>