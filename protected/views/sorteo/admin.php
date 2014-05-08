<?php
$this->breadcrumbs=array(
	'Sorteos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t("app","List"). ' Sorteo', 'url'=>array('index')),
	array('label'=>Yii::t("app","Create"). ' Sorteo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sorteo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sorteos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sorteo-grid',
  'dataProvider'=>$model->search(),
	'columns'=>array(
      'id',          // display the 'title' attribute
      
    array(            // display 'author.username' using an expression
      'name'=>'Premios',
      'value'=>'json_decode($data->json)->premios',
        ),
    array(
      'name'=>'Inicio Sorteo',
      'value'=>'json_decode($data->json)->iniSorteo',
    ),
    array(
      'name'=>'Fin Sorteo',
      'value'=>'json_decode($data->json)->finSorteo',
    ),
    /*
    array(
      'name'=>'Premiar',
      'type'=>'raw',
      //'value'=>CHtml::link('Premiar', array('soertear', 'id'=>'$data->id')),
      'value'=>'CHtml::link("Premiar","ingreso/sorteo")',
    ),*/
    array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
