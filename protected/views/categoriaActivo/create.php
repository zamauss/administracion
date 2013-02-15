<?php
$this->pageCaption='Create CategoriaActivo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo categoriaactivo';
$this->breadcrumbs=array(
	'Categoria Activo'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Categoria Activo', 'url'=>array('index')),
	array('label'=>'Administrar Categoria Activo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>