<?php
$this->breadcrumbs=array(
	'Sorteos',
);

$this->menu=array(
	array('label'=>'Nuevo Sorteo', 'url'=>array('nuevosorteo')),
  array('label'=>'Administrar Sorteos', 'url'=>array('admin')),
);
echo '<h1>Listado de Sorteos</h1>'; 
  $this->widget('zii.widgets.grid.CGridView', array(
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
    array(
      'name'=>'Premiar',
      'type'=>'raw',
      //'value'=>CHtml::link('Premiar', array('soertear', 'id'=>'$data->id')),
      'value'=>'CHtml::link("Premiar","sortear?id=$data->id")',
    ),
	 array(
      'name'=>'Ganadores',
      'type'=>'raw',
      //'value'=>CHtml::link('Premiar', array('soertear', 'id'=>'$data->id')),
      'value'=>'CHtml::link("Consultar","view?id=$data->id")',
    ),
	 array(
      'name'=>'Participantes',
      'type'=>'raw',
      //'value'=>CHtml::link('Premiar', array('soertear', 'id'=>'$data->id')),
      'value'=>'CHtml::link("Consultar","consultar?id=$data->id")',
    ),
	),
)); 

?>

<?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/hoja.jpg');?><h1>Listado de Premios a sortear</h1>
<div id="tablaGanadores" class="grid-view">
  <table class="items">
  <thead>
  <tr>
    <th>
    Regalo
    </th>
      
  </tr>
  </thead>
  <tbody>
	<?php 
		$dato =  Sorteo::ListadoPremios();
		$dato = Premios::model()->find('id_sorteo='.$id);
		$json= json_decode($dato['json']);
		
		for($x=0;($x<count($json));$x++)
		{
			
		if($x%2==0)
		{
			echo '<tr class="odd"> ';
		}else
			{
			echo '<tr class="even"> ';
			}
		
		
		#echo '<td>'.$dato[$x]['nro'].'</td>';
    	echo '<td><b>'.$json[$x].'<b></td>';
    	//echo '<td>'.$dato[$x]['sponsor'].'</td>';
    	echo '</tr>';
		}
		
?>
 </tbody>
</table>
</div>