<?php
$this->breadcrumbs=array(
	'Sorteos',
);

$this->menu=array(
	array('label'=>'Create Sorteo', 'url'=>array('create')),
	array('label'=>'Manage Sorteo', 'url'=>array('admin')),
);
?>

<h1>Sorteos</h1>
<table>
    <tr>
   
        <td>Nro_orden</td>
        <td>Dni</td>
        <td>sortear</td>
    
    </tr>
   
    
    <?php
    /*
          foreach($dataProvider->getData() as $fila)
        {
            echo '<tr><td>'.$fila->nro_orden.'</td>';
            echo '<td>'.$fila->dni.'</td>';
            if(isset(sorteo::$ganador[$fila->id]))
            {
                echo '<td>'.sorteo::$ganador[$fila->id].'</td>';
            }else
            {
                echo '<td>'.CHtml::link('Sortear','../sorteo/sorteo?id='.$fila->id).'</td></tr>';
            }
        }
    */
    ?>    
    
       
</table>
<?php
/*
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/
?>
