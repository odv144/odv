<?php
$this->breadcrumbs=array(
	'Ingresostotales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ingresostotales', 'url'=>array('index')),
	array('label'=>'Manage Ingresostotales', 'url'=>array('admin')),
);
?>

<h1>Create Ingresostotales</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>