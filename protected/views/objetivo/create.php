<?php
$objetivoGral = ObjetivoGeneral::model()->find('id = ' . $_GET['objetivoGeneral_did']);
$this->pageCaption=$objetivoGral->descripcion;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Objetivo',
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('site/index')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>