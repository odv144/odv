<?php
$this->breadcrumbs=array(
	'Publicidad'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Publicidad', 'url'=>array('index')),
	array('label'=>'Administrar Publicidad', 'url'=>array('admin')),
);
?>

<h1>Nueva Publicidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>