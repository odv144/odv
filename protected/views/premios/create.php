<?php
$this->breadcrumbs=array(
	'Premios'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Premios', 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage').' Premios', 'url'=>array('admin')),
);
?>

<h1>Ingresar Nuevos Premios Premios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>