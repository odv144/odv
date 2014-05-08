<?php
$this->breadcrumbs=array(
	'Contadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Contador', 'url'=>array('index')),
	array('label'=>'Manage Contador', 'url'=>array('admin')),
);
?>

<h1>Create Contador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>