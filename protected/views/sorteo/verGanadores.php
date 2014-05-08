<h1>LISTADO DE GANADORES</h1>

<?php 
  
 if(isset($msj->error))
 {
  foreach($msj->error as $error)
  {
    echo $error;
  }
          
}else{
?>
<div id="tablaGanadores" class="grid-view">
  <table class="items">
   <thead>
  
   <tr>
    <th>
    Orden
    </th>
    <th>
    D.N.I.
    </th>
    <th>
    Fecha
    </th>
    
  </tr>
  </thead>
  <tbody>
  <?php for($x=0;$x<(count($json->ganadores));$x++): ?>
  <?php if(($x%2)==0)
  {
	  echo '<tr class="odd">';
  }else
  	{
		echo '<tr class="even">';
	 }
  ?>
    <td><?php echo $x+1;?></td>
    <!-- obtengo la variable $json->ganadores y luego la decodifico a json
    y ahi obtengo solo el dni
    -->
    <td><?php echo json_decode($json->ganadores[$x])->dni;?></td> 
    <td>
    <?php 
	$fecha = json_decode($json->ganadores[$x]);
    $fecha = new DateTime($fecha->fecha);  
    echo $fecha->format('d-m-Y');
    
    //echo DateTime($json->fecha,'d-m-y');
    ?></td>
  </tr>
  <?php endfor ?>
 </tbody>
</table>
</div>
<?php 
  echo '<h3>Total de participantes en el Sorteo: '.$json->mensaje->total.'<br>';
  echo 'Total de DNI repetidos: '.$json->mensaje->repetidos.'<br>';
  echo 'Total de participantes en el Sorteo: '.$json->mensaje->participantes.'<br></h3>';

}
?>