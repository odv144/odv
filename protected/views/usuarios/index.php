<?php
$this->breadcrumbs=array(
	'Listado de Usuarios registrados para uso del sistema',
);


?>

<h1>Usuarioses</h1>

<?php 
	
	foreach($dataProvider->getData() as $cliente)
	{
		
		echo '<div class="usuario">';
		echo '<b>ID: </b>'.$cliente->id.'<br>';
		echo '<b>Nick: </b>'.$cliente->nick.'<br>';
		echo '<b>DNI:</b> '.$cliente->dni.'<br>';
		echo '<b>Nombre:</b> '.$cliente->nombre.'<br>';
		echo '<b>Apellido:</b> '.$cliente->apellido.'<br>';
		echo '<b>Direccion:</b> '.$cliente->direccion.'<br>';
		echo '<b>Telefono:</b> '.$cliente->telefono.'<br>';
		echo '<b>Email:</b> '.$cliente->email.'<br>';
		        
        // El primer parametro '2' indica que quieres buscar solamente los Roles
        $rol = Yii::app()->authManager->getAuthItems(2,$cliente->id);
        // Suponiendo que cada usuario tiene UN solo ROL asignado
        // Se puede acceder directamente con $rol[0]
        // Caso contrario tenes que recorrer el array con un foreach
        $dato='Sin Determinar';
		foreach($rol as $tipo)
		{
			
			$dato = $tipo->name;
		}
		echo '<b>Permiso: </b>'.$dato.'</br>';
       
		echo '</div>';
	}
	/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	));
	*/
?>
