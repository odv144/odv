<?php
$this->breadcrumbs=array(
	'Ingresostotales',
);

$this->menu=array(
	array('label'=>'Create Ingresostotales', 'url'=>array('create')),
	array('label'=>'Manage Ingresostotales', 'url'=>array('admin')),
);
?>

<h1>Ingresostotales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
