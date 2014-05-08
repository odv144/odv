<?php
$this->breadcrumbs=array(
	'Ingresostotales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ingresostotales', 'url'=>array('index')),
	array('label'=>'Create Ingresostotales', 'url'=>array('create')),
	array('label'=>'Update Ingresostotales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ingresostotales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingresostotales', 'url'=>array('admin')),
);
?>

<h1>View Ingresostotales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'orden',
		'dni',
		'fecha',
	),
)); ?>
