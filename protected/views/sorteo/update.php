<?php
$this->breadcrumbs=array(
	'Sorteos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sorteo', 'url'=>array('index')),
	array('label'=>'Create Sorteo', 'url'=>array('create')),
	array('label'=>'View Sorteo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sorteo', 'url'=>array('admin')),
);
?>

<h1>Update Sorteo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_nuevo', array('model'=>$model)); ?>