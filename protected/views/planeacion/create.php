<?php
$this->pageCaption='Crea tu Planeación';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Planeacion'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Planeacion', 'url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>