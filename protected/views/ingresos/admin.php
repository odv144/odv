<?php
$this->breadcrumbs=array(
	'Ingresos'=>array('index'),
	Yii::t('app','Manager'),
);

$this->menu=array(
	array('label'=> Yii::t('app','List').' Ingresos', 'url'=>array('index')),
	array('label'=> Yii::t('app','Create').'  Ingresos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ingresos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador de Ingresos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ingresos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dni',
		'fecha',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
