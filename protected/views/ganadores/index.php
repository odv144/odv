<?php
$this->breadcrumbs=array(
	'Ganadores',
);

$this->menu=array(
	array('label'=>'Create Ganadores', 'url'=>array('create')),
	array('label'=>'Manage Ganadores', 'url'=>array('admin')),
);
?>

<h1>Ganadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
