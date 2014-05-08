<?php $this->beginContent('//layouts/main'); ?>

<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->

    <?php 
		$model=Publicidad::model()->findAll();
		
		foreach($model as $dato)
		{
			$this->widget('ext.publicidad.OPubli',array(
				'mensaje'=>'Publicidad escrita afuera del widget',
				'model'=>$dato,
			));
		}
		
	?>
   
    
</div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>