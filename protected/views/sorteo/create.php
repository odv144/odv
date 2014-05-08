<?php
$this->breadcrumbs=array(
	'Sorteos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sorteo', 'url'=>array('index')),
	array('label'=>'Manage Sorteo', 'url'=>array('admin')),
);
?>

<h1>Create Sorteo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>