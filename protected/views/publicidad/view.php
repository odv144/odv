<?php
$this->breadcrumbs=array(
	'Publicidad'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Publicidad', 'url'=>array('index')),
	array('label'=>'Nueva Publicidad', 'url'=>array('create')),
	array('label'=>'Modificar Publicidad', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Publicidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Confirma que desea borrar el item seleccionado?')),
	array('label'=>'Administrar Publicidad', 'url'=>array('admin')),
);
?>

<h1>Mostrar todas las Publicidad #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'empresa',
		'imagen',
	),
)); ?>
