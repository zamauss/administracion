<?php
$this->pageCaption='Create TipoUsuario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo tipousuario';
$this->breadcrumbs=array(
	'Tipo Usuario'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipo Usuario', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Usuario', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>