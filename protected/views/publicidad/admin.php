<?php
$this->breadcrumbs=array(
	'Publicidads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Publicidad', 'url'=>array('index')),
	array('label'=>'Nuevo Publicidad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('publicidad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Publicidads</h1>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'publicidad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'empresa',
		'imagen',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
