<?php
$this->breadcrumbs=array(
	'Sorteos'=>array('index'),
	
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Sorteo', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create').' Sorteo', 'url'=>array('create')),
	array('label'=>Yii::t('app','Update').' Sorteo', 'url'=>array('update', 'id'=>$id)),
	array('label'=>Yii::t('app','Delete').' Sorteo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage').' Sorteo', 'url'=>array('admin')),
);
?>



<h1>Mostrando Participantes del Sorteo Nro: <?php echo $id; ?></h1>

<?php 
$criteria=new CDbCriteria;

$ini = new DateTime($iniSorteo);
$ini = $ini->format('Y-m-d 00:00:00');
$fin = new DateTime($finSorteo); 
$fin = $fin->format('Y-m-d 23:59:59');
//$criteria->addCondition('"$ini" >= fecha AND fecha <= "$fin"');

//$criteria->addCondition('fecha = "$ini"','OR');
$criteria->addBetweenCondition('fecha',$ini,$fin);
//$criteria->addCondition('fecha = "'.$ini.'"','OR');
//$criteria->addCondition('fecha = "$fin"','OR');
$dataProvider = new CActiveDataProvider($modIng,array('criteria'=>$criteria,
      'pagination'=>array('pageSize'=>50,),)); 


$this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'consulta-grid',
	//'dataProvider'=>Ingresos::model()->search(),
	'dataProvider'=> $dataProvider,
	'columns'=>array(
		'id',
		'dni',
		'fecha',
		
	),
));
?>