<?php
$this->breadcrumbs=array(
	'Ingresos',
);

$this->menu=array(
	array('label'=>Yii::t('app','Create').' Ingresos', 'url'=>array('create')),
	//array('label'=>'Manage Ingresos', 'url'=>array('admin')),
  //array('label'=>'Nuevo Sorteo', 'url'=>array('nuevo')),
);

?>

<h1>Ingreso de Documentos</h1>

<?php 
  /*
  $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
  )); */
  if($model==null)
  {
    $this->redirect(array('index'));
  } 
  $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'tabla',
  'dataProvider'=>$model->search(),
    'columns'=>array(
		'id',
		'dni',
		//'fecha',
    array(
      'name'=>'Fecha',
      //'value'=>'DateTime::createFromFormat("d-m-Y",$data->fecha)',
      //'type'=>'datetime',
      'value'=> '$data->fecha',
    ),
  )
 ));
 
?>
