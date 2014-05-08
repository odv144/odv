<?php
$this->breadcrumbs=array(
	'Ingresostotales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ingresostotales', 'url'=>array('index')),
	array('label'=>'Create Ingresostotales', 'url'=>array('create')),
	array('label'=>'View Ingresostotales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ingresostotales', 'url'=>array('admin')),
);
?>

<h1>Update Ingresostotales <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>