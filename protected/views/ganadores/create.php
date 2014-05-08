<?php
$this->breadcrumbs=array(
	'Ganadores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ganadores', 'url'=>array('index')),
	array('label'=>'Manage Ganadores', 'url'=>array('admin')),
);
?>

<h1>Create Ganadores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>