<?php
$this->breadcrumbs=array(
	'Comentarioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comentarios', 'url'=>array('index')),
	array('label'=>'Create Comentarios', 'url'=>array('create')),
	array('label'=>'View Comentarios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comentarios', 'url'=>array('admin')),
);
?>

<h1>Update Comentarios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>