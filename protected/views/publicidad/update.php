<?php
$this->breadcrumbs=array(
	'Publicidad'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Lista Publicidad', 'url'=>array('index')),
	array('label'=>'Nuevo Publicidad', 'url'=>array('create')),
	array('label'=>'Ver Publicidad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Publicidad', 'url'=>array('admin')),
);
?>

<h1>Modificar Publicidad <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>