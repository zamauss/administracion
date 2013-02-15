<?php
$this->pageCaption='Actualizar TipoPostit '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tipo Postit'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Tipo Postit', 'url'=>array('index')),
	array('label'=>'Crear TipoPostit', 'url'=>array('create')),
	array('label'=>'Ver TipoPostit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Tipo Postit', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>