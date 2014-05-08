<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    	<div class="span-5">
        <?php 
		
		echo '<div class="publi">';
		
		Publicidad::setPubli();
		$dato=(Publicidad::getPubliLarga());
		$nro=mt_rand(0,count($dato)-1);
		$this->widget('ext.publicidad.OPubli',array(
				'mensaje'=>'Publicidad escrita afuera del widget',
				'model'=>$dato[$nro],
			));
		
		echo '</div>';
		
		
	?>
        </div>    	
        <div class="span-19 last">
   			<?php echo $content; ?>
    	</div>
    	
       
		<div class="span-24 last">
        	<?php //echo $content;
			//de esta forma puedo agregar una pagina dentro de otra en column2
				$this->renderPartial($this->ruta);
			?>
        </div>
		
		
        
</div>
<?php $this->endContent(); ?>