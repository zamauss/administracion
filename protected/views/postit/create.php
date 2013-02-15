<?php
$this->pageCaption='Nuevo postit ' . $model->tipoPostit->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Postit',
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>