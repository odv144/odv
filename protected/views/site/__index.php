<?php $this->pageTitle=Yii::app()->name; 

?>

<h1>Bienvenidos al sitio de <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Agradecemos su apoyo y seguimiento de nuestros medios radiales y televisivos.</p>
<p>Tambien agradecemos a nuestros ausipiantes que permiten que esto sea posible</p>
<p><h6>Gracias a los mismo podremos realizar sorteos de gran importancia durante todo este año 2013</h6></p>
<p><h4>Si quieres puedes registrarte gratuitamente haciendo click <?php echo CHtml::link('Aqui','../usuarios/create');?>, y asi recibir el listado de ganadores de los sorteos
o también puedes Votar o dejar tus comentarios.</h4></p>

<?php 
	$dato = Comentarios::model()->findAll();
	//$dato = model()->search();
	/*$this->widget('zii.widgets.CListView',array(
		'dataProvider'=>Comentarios::model()->search(),
		'itemView'=>'../comentarios/_comentario',
	));
	*/?>
	<div id="comentario" class="comentarios">
	<?php $x=0;?>
	<?php foreach($dato as $d)
	{
		$x++;
		$json=json_decode($d->json);	
		//print_r($json);
		?>
        <div class="anillo"></div>
		<div class="comen-fecha">
        	<?php echo 'Comentario realizado el día:'.$json->fecha.'<br />'; ?>
        	<div class="comen-nro">
				<?php echo '#'.$x; ?>
        	</div>
        </div>
        
        <div class="comen-perfil">
		<?php	
			$model = Usuarios::model()->find('id ='.$d->id_user);
			echo 'Usuario:<br/>'.$model->nick;
		?>
        </div>
        <div class="comen-text">
        	<?php echo '<b>Comentario:</b><br/><span>'. $json->comen.'</span>';?>
        </div>
        
        
	
	<?php 
	}
    ?>
	</div>
   