<?php 
	class OPubli extends Cwidget
	{
		public $mensaje='publicidad';
		public $model='nada';
		public function init()
		{?>
		
       
        	<span><?php echo $this->model->empresa;?></span>
    		<img src="<?php echo Yii::app()->baseUrl. $this->model->imagen;	?>" />	
		
		
		<?php }
	}
?>
