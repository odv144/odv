<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- blueprint CSS framework -->
	
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
    
    
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
    <link rel="stylesheet"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/elegante.css" media="screen, projection" />
	<link href="<?php echo Yii::app()->theme->baseUrl;?> /css/main3.css" rel="stylesheet" />
 
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
	<div id="bot-red-social" class="span-24 last" >
        
        <div class="bot-social span-16">
        
        <div class="fb-like" data-href="http://onda100.com.ar" data-send="false" data-width="500" data-show-faces="false" data-font="arial"></div>
        
        </div>
        
        <div class="bot-social span-8 last">
        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    	</div>
        
    </div>
	<header>
    <div id="header" class="span-24 last">
	    <div class="span-9">
         <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/logo.png');?>
		 <?php //echo CHtml::encode(Yii::app()->name); ?>
    	</div>
        <div class="span-15 last">
        	<div id="slogan">
        		<?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/slogan.png');?>
        	</div>
        </div>
        <div  id="header-2" class="span-24 last">
        	<?php //echo CHtml::image(Yii::app()->theme->baseUrl.'/images/imagen_header.png');?>
            <span>Nuestra mayor satisfaccion es darle el mejor servicio a nuestro clientes</span>
        </div>
        
     
	</div>
    </header><!-- header -->
	<nav>
	<div class="nav span-24 last">
		<?php $this->widget('zii.widgets.CMenu',array(
			'id'=>'nav',
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Contacto', 'url'=>array('/site/contact')),
				/*array('label'=>'Portafolio', 'url'=>array('/site/construccion'),
					'items'=>array(
						array('label'=>'Onda 100', 'url'=>'http://www.onda100.com.ar'),
						array('label'=>'Odontologia', 'url'=>'http://www.odontologiavo.com.ar'),
						array('label'=>'Centro Comercial', 'url'=>'http://comercialvo.com.ar'),
						array('label'=>'...', 'url'=>array('/premios/index')),
			),			
				'visible'=>Yii::app()->authManager->checkAccess('Administrador',Yii::app()->user->id)),*/
				
        		array('label'=>'Registrar', 'url'=>array('/usuarios/create'),'visible'=>Yii::app()->user->isGuest),
				/*array('label'=>'Administrador', 'url'=>array('/site/construccion'), 
					'items'=>array(
						array('label'=>'Publicidad', 'url'=>array('/publicidad/index')),
						array('label'=>'Usuario', 'url'=>array('/usuarios/index')),
						array('label'=>'Enviar', 'url'=>array('/usuarios/enviar')),
						array('label'=>'Premios', 'url'=>array('/premios/index')),
			),			
				'visible'=>Yii::app()->authManager->checkAccess('Administrador',Yii::app()->user->id)),*/
				
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'encodeLabel'=>false,
		)); ?>
	
    </div> <!-- mainmenu -->
	</nav>
    <section>   
    <div class="span-24 last">
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    </div>
    </section>
    <section>
    <?php //de esta forma agrego el scrip desde un archivo
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/main3.js');
	
	?>  
  	<div class="galeria">
            <ul class="grid">
                <?php 
					for($x=1;$x<9;$x++){
					echo '<li id="g'.$x.'">';
						for($z=1;$z<8;$z++){
						echo '<div class="d'.$z.'"></div>';
						}
					echo '</li>';
					}
				?>
                
            </ul>
   </div>
   </section>
   <section>
   <div class="container">
    	<aside>
        <div class="nav-lateral span-4">
        <hgroup>
        	<h3>Servicios Web</h3>
        </hgroup>
		<?php $this->widget('zii.widgets.CMenu',array(
			'id'=>'nav-izq',
			'items'=>array(
				array('label'=>'Web Economicas', 'url'=>array('/site/construccion')),
				array('label'=>'Web Personalizadas', 'url'=>array('/site/construccion')),
				array('label'=>'Carritos/E-Commerce', 'url'=>array('/site/construccion')),
				array('label'=>'Autogestionables', 'url'=>array('/site/construccion')),
				array('label'=>'Mantenimiento', 'url'=>array('/site/construccion')),
				)
			));
		?>	
        	
		</div>
       
        <div class="nav-lateral2 span-4 last">
        <hgroup>
        	<h3>Otros Servicios</h3>
        </hgroup>
		<?php $this->widget('zii.widgets.CMenu',array(
			'id'=>'nav-izq2',
			'items'=>array(
				array('label'=>'Servicio Tecnico', 'url'=>array('/site/construccion')),
				array('label'=>'Portafolio', 'url'=>array('/site/construccion'),
					'items'=>array(
							array('label'=>'Onda 100','url'=>'http://www.onda100.com.ar'),
							array('label'=>'Odontologia','url'=>'http://www.odontologiavo.com.ar'),
							array('label'=>'Centro Comercial','url'=>'http://www.ccysocial.com.ar'),
					)),
					
				array('label'=>'Asistencia', 'url'=>array('/site/construccion')),
				array('label'=>'Asesoramiento', 'url'=>array('/site/construccion')),
				array('label'=>'Newlleter', 'url'=>array('/site/construccion')),
				array('label'=>'Envio de Mailist', 'url'=>array('/site/construccion')),
				)
			));
		?>	
        	
		</div>
		</aside>
        <article>      	
        <div class="span-20 last">
   			<?php echo $content; ?>
    	</div>
        </article>
    </div>
	</section>
	<footer>
	<div id="footer-1" class="span-24 last">
    	<div class="span-6">
        <hgroup><h4>Mas Servicios</h4></hgroup>
        <?php $this->widget('zii.widgets.CMenu',array(
			'id'=>'foot-servicio',
			'items'=>array(
				array('label'=>'Servicio Tecnico', 'url'=>array('/site/construccion')),
				array('label'=>'Portafolio', 'url'=>array('/site/construccion'),
					'items'=>array(
							array('label'=>'Onda 100','url'=>'http://www.onda100.com.ar'),
							array('label'=>'Odontologia','url'=>'http://www.odontologiavo.com.ar'),
							array('label'=>'Centro Comercial','url'=>'http://www.ccysocial.com.ar'),
					)),
					
				array('label'=>'Asistencia', 'url'=>array('/site/construccion')),
				array('label'=>'Asesoramiento', 'url'=>array('/site/construccion')),
				array('label'=>'Newlleter', 'url'=>array('/site/construccion')),
				array('label'=>'Envio de Mailist', 'url'=>array('/site/construccion')),
				)
			));
		?>	
        </div>
        <div class="span-6">
        <hgroup><h4>Contacto</h4></hgroup>
        </div>
        <div class="span-6"> 
        <hgroup><h4>Terminos y Condiciones</h4></hgroup>
        </div>
        <div class="span-6 last">
        <hgroup><h4>Seguinos en</h4></hgroup>
        </div>
    
    </div>
	<div id="footer-2" class="span-24 last">
		Copyright &copy; <?php echo date('Y'); ?> by OdvSystem. Todos los derechos reservados.	<br />
		<?php echo 'Desarrollado por Virili Omar Dario (OdvSystem)'; ?>
	</div><!-- footer -->
	</footer>
	
</div><!-- page -->

</body>
</html>
