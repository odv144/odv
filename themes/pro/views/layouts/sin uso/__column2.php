<?php $this->beginContent('//layouts/main'); ?>
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
	   
    <!-- para armar el contador de visitas -->
		<div id="marco-contador">
		<?php 
            $model=Contador::model()->findByPk(1);
			
			if(!(Yii::app()->getSession()->get('visitado')))
			{	
				
				Yii::app()->getSession()->add('visitado','1');
				$model->contador++;
				
				$model->save();
				
			}
			
			$cont = "000000".$model->contador;
			$this->widget('ext.conta.OConta',array('contador'=>$cont));
			
		
		?>	
    	</div>
</div>	

<div class="span-19 last">
		<div class="content">
		<?php echo $content; ?>
		</div>	<!-- content -->
</div>

</div>
<?php $this->endContent(); ?>