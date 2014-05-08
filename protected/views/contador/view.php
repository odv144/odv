<?php
$this->breadcrumbs=array(
	'Contadors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Contador', 'url'=>array('index')),
	array('label'=>'Create Contador', 'url'=>array('create')),
	array('label'=>'Update Contador', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Contador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contador', 'url'=>array('admin')),
);
?>

<h1>View Contador #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'contador',
	),
)); ?>
