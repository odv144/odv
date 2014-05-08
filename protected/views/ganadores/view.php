<?php
$this->breadcrumbs=array(
	'Ganadores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ganadores', 'url'=>array('index')),
	array('label'=>'Create Ganadores', 'url'=>array('create')),
	array('label'=>'Update Ganadores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ganadores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ganadores', 'url'=>array('admin')),
);
?>

<h1>View Ganadores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'json',
	),
)); ?>
