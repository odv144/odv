<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/elegante.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" media="screen, projection" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>


<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container" id="page">
	<div id="bot-red-social">
        
        <div class="bot-social">
        
        <div class="fb-like" data-href="http://onda100.com.ar" data-send="false" data-width="450" data-show-faces="false" data-font="arial"></div>
        
        </div>
        
        <div class="bot-social">
        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    	</div>
        
    </div>
	
    <div id="header">
	    <div id="logo">
          <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/LOGUITO.jpg');?>
		 <?php //echo CHtml::encode(Yii::app()->name); ?>
    	</div>
       
        
     
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Contacto', 'url'=>array('/site/contact')),
        		array('label'=>'Sorteo', 'url'=>array('/sorteo/index')),
        		array('label'=>'Registrar', 'url'=>array('/usuarios/create'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cargar Dni', 'url'=>array('/ingresos/create'), 'visible'=>Yii::app()->authManager->checkAccess('Administrador',Yii::app()->user->id)),
				#array('label'=>'<img src="'.Yii::app()->theme->baseUrl.'/images/radio.jpg">', 'url'=>array('http://es.justin.tv/fm999ondacien'),'itemOptions'=>array('atl'=>'Escuchar Radio')),
				array('label'=>'Escuchar','url'=>'http://es.justin.tv/fm999ondacien'),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'encodeLabel'=>false,
		)); ?>
	<?php 
		if((Yii::app()->authManager->checkAccess('Visitante',Yii::app()->user->id)))
		{
			echo'<div id="submenu">';
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Participar','url'=>array('/comentarios/votar')),
				array('label'=>'Comentario','url'=>array('/comentarios/create')),
			),
			'encodeLabel'=>true,
			));
			echo'</div>';
		}		
	?>
    </div>
   
    <?php 
		if((Yii::app()->authManager->checkAccess('Programador',Yii::app()->user->id)))
		{
			echo'<div id="menuProgramador">';
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Publicidad', 'url'=>array('/publicidad/index')),
				array('label'=>'Usuario', 'url'=>array('/usuarios/index')),
				array('label'=>'Enviar', 'url'=>array('/usuarios/enviar')),
				array('label'=>'Premios', 'url'=>array('/premios/index')),
			),
			'encodeLabel'=>true,
			));
			echo'</div>';
		}	
	?>
    
    <!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by OdvSystem.<br/>
		Todos los derechos reservados.<br/>
		<?php echo 'Desarrollado por Virili Omar Dario (OdvSystem)'; ?>
	</div><!-- footer -->

</div><!-- page -->
</body>
</html>
