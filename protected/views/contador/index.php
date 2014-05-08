<?php
$this->breadcrumbs=array(
	'Contadors',
);

$this->menu=array(
	array('label'=>'Create Contador', 'url'=>array('create')),
	array('label'=>'Manage Contador', 'url'=>array('admin')),
);
?>

<h1>Contadors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
