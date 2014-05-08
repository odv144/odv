<?php
$this->breadcrumbs=array(
	'Ganadores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ganadores', 'url'=>array('index')),
	array('label'=>'Create Ganadores', 'url'=>array('create')),
	array('label'=>'View Ganadores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ganadores', 'url'=>array('admin')),
);
?>

<h1>Update Ganadores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>