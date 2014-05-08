<?php
$this->breadcrumbs=array(
	'Premioses',
);

$this->menu=array(
	array('label'=>'Create Premios', 'url'=>array('create')),
	array('label'=>'Manage Premios', 'url'=>array('admin')),
);
?>

<h1>Premioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
