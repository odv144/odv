<?php
$this->breadcrumbs=array(
	'Contadors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contador', 'url'=>array('index')),
	array('label'=>'Create Contador', 'url'=>array('create')),
	array('label'=>'View Contador', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Contador', 'url'=>array('admin')),
);
?>

<h1>Update Contador <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>