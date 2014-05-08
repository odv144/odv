<?php
$this->breadcrumbs=array(
	'Premioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Premios', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create').' Premios', 'url'=>array('create')),
	array('label'=>Yii::t('app','View').' Premios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage').' Premios', 'url'=>array('admin')),
);
?>

<h1>Actualizacion de Premios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>