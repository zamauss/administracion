<?php
$this->pageCaption='Actualizar CategoriaActivo '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Categoria Activo'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Categoria Activo', 'url'=>array('index')),
	array('label'=>'Crear CategoriaActivo', 'url'=>array('create')),
	array('label'=>'Ver CategoriaActivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Categoria Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>