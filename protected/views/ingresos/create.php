<?php
$this->breadcrumbs=array(
	'Ingresos'=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>'Listar DNI', 'url'=>array('index')),
	array('label'=>'Realizar Sorteos', 'url'=>array('sortear')),
);
?>

<h1>Ingresar nuevos documentos</h1>

<?php  echo $this->renderPartial('_form', array('model'=>$model)); ?>