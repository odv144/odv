<?php
$this->breadcrumbs=array(
	'Premios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Premios', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create').' Premios', 'url'=>array('create')),
	array('label'=>Yii::t('app','Update').' Premios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Delete').' Premios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage').' Premios', 'url'=>array('admin')),
);
?>

<h1>Mostrando el listado de Premios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_sorteo',
		'json',
	),
)); ?>
