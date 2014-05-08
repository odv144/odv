<?php
$this->breadcrumbs=array(
	'Publicidad',
);

$this->menu=array(
	array('label'=>'Nueva Publicidad', 'url'=>array('create')),
	array('label'=>'Administrar Publicidad', 'url'=>array('admin')),
);
?>

<h1>Publicidad que auspician los sorteos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
