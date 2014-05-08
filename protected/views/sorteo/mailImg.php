<img src="http://img6.uploadhouse.com/fileuploads/17639/17639364a481eb3312a8c5d880230e69ab408c6c.jpg" />
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

<div id="tablaGanadores" class="grid-view" style="padding:15px 0;width:80%;margin:auto;">
  <table class="items" style="background: white;border-collapse: collapse;width: 100%;border: 1px #D0E3EF solid;">
  <thead>
  <tr style="background-color:#F90">
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
	  echo '<tr class="odd" style="background: hsla(240,100%,50%,0.3);">';
  }else
  	{
		echo '<tr class="even" style="background: hsla(260,100%,70%,0.2);">';
	 }
  ?>
    <td><?php echo $x+1;?></td>
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
<img src="http://img4.uploadhouse.com/fileuploads/17639/17639394ea9e3fb81cb29b7f1ef0f95e348289cf.jpg" alt="mail image" style="text-align:center" />