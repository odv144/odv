<?php
$this->breadcrumbs=array(
	'Ingresos'=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>'Listar DNI', 'url'=>array('index')),

);
?>

<h1>Ingreso de nuevos concursos</h1>

<?php echo $this->renderPartial('_nuevo', array('model'=>$model)); ?>