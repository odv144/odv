<!DOCTYPE html>
<html>
<head>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=1040" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Arvo:700" rel="stylesheet" type="text/css" />
		<script src="<?php echo Yii::app()->theme->baseUrl; ?> /js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.dropotron-1.3.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/config.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/skel.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/skel-ui.min.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/skel-noscript.css" />
       <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style-desktop.css" />
		
		
	</head>
	
<body class="homepage">


    <!-- Header Wrapper -->
	<div id="header-wrapper">
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
				<!-- Header -->
					<div id="header" class="container">
						<img src="<?php echo Yii::app()->theme->baseUrl.'/images/header.png';?>" />
						<!-- Logo -->
							<h3 id="logo"><a href="#">Programando hoy con tecnologia del futuro</a></h3>
                            <p> <?php //echo CHtml::image(Yii::app()->theme->baseUrl.'/images/logo.png');?>
                            
                            </p>
							
						
						<!-- Nav -->
                        <nav id="nav">
								<ul>
									<li>
                                    	<a class="icon icon-home" href="index.html">
                                    		<span>Home</span>
                                    	</a>
                                    </li>
                                    <li>
                                    	<a class="icon icon-home" href="/jquery/galeria">
                                    		<span>Galeria</span>
                                    	</a>
                                    </li>
									<li>
										<a href="" class="icon icon-bar-chart">
                                        	<span>Servicios</span>
                                        </a>
										<ul>
											<li><a href="#">Mantenimiendo</a></li>
											<li><a href="#">Web Economicas</a></li>
											<li><a href="#">Carritos/E-commerce</a></li>
											<li>
												<a href="">Servicio Tecnico</a>
												<ul>
													<li><a href="#">Reparacion de CPU</a></li>
													<li><a href="#">Notebook y Netbook</a></li>
													<li><a href="#">Impresora todo tipo</a></li>
												</ul>
											</li>
											
										</ul>
									</li>
									<li>
                                    	<a class="icon icon-cog" href="left-sidebar.html">
                                    		<span>Taller</span>
                                    	</a>
                                    </li>
									<li>
                                    	<a class="icon icon-retweet" href="right-sidebar.html">
                                        	<span>Productos</span>
                                        </a>
                                    </li>
									<li>
                                    	<a class="icon icon-sitemap" href="no-sidebar.html">
                                        	<span>Constacto</span>
                                        </a>
                                    </li>
								</ul>
							</nav>

					</div>

			</div>
			
		<!-- Features Wrapper -->
        <div id="features-wrapper">

			<!-- Features -->
			<section id="features" class="container">
				
                <header>
					<h2>Gracias por visitar nuestro sitio de  <strong>Odv System</strong>!</h2>
				</header>
				<div class="row">
					<div class="4u">

					<!-- COLUMNA1 -->
					<section>
					<a href="#" class="image image-full"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/pic01.jpg';?>" /></a>
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
                    </section>
					</div>
					
                    <div class="4u">
					<!-- COLUMNA2 -->
					<section>
					<a href="#" class="image image-full"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/pic02.jpg';?>" /></a>
					<hgroup>
        				<h3>Otros Servicios</h3>
       				</hgroup>
					<?php $this->widget('zii.widgets.CMenu',array(
                    'id'=>'nav-izq2',
                    'items'=>array(
                    array('label'=>'Servicio Tecnico', 'url'=>array('/site/construccion')),
                    array('label'=>'Portafolio', 'url'=>array('/site/construccion')),          
                    array('label'=>'Asistencia', 'url'=>array('/site/construccion')),
                    array('label'=>'Asesoramiento', 'url'=>array('/site/construccion')),
                    array('label'=>'Newlleter', 'url'=>array('/site/construccion')),
                    array('label'=>'Envio de Mailist', 'url'=>array('/site/construccion')),
                            )
                     ));
                    ?>	
        			</section>
            		</div>
            		<div class="4u">
					<!-- Feature -->
					<section>
					<a href="#" class="image image-full"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/pic03.jpg';?>" /></a>
					<hgroup>
                    	<h4>Mas Servicios</h4>
                    </hgroup>
					<?php $this->widget('zii.widgets.CMenu',array(
                    'id'=>'foot-servicio',
                    'items'=>array(
                    array('label'=>'Servicio Tecnico', 'url'=>array('/site/construccion')),
                    array('label'=>'Portafolio', 'url'=>array('/site/construccion')),                  	array('label'=>'Asistencia', 'url'=>array('/site/construccion')),
                    array('label'=>'Asesoramiento', 'url'=>array('/site/construccion')),
                    array('label'=>'Newlleter', 'url'=>array('/site/construccion')),
                    array('label'=>'Envio de Mailist', 'url'=>array('/site/construccion')),
                           )
                     ));
                    ?>	
                    </section>
                    </div>
                    <ul class="actions">
					<li>
                    	<a href="#" class="button button-icon icon icon-file">Ver mas informacion</a>
                    </li>
					</ul>
					</section>
			
			</div>
	
   <!-- Banner Wrapper 
			<div id="banner-wrapper">
				<div class="inner">

					<!-- Banner 
						<section id="banner" class="container">
							<p>Use this space for <strong>profound thoughts</strong>.<br />
							Or an enormous ad. Whatever.</p>
						</section>

				</div>
			</div>

		<!-- Main Wrapper -->
        <!-- Main Wrapper -->
			<div id="main-wrapper">

				<!-- Main -->
					<div id="main" class="container">
						<div class="row">
						
						<!-- Content -->
						<div id="content" class="8u">

							<!-- Post -->
							<article class="is-post">
								<header>
									<h2>
                                    	<a href="#">DISEÑO DE PÁGINAS WEB ECONÓMICAS / DISEÑO WEB ECONOMICOS.</a>
                                    </h2>
								</header>
								<div id="distinto">
                                <?php echo $content; ?>
                                </div>
							</article>

								<!-- Post -->
								<article class="is-post">
								<header>
								<h2><a href="#">By the way, many thanks to <strong>regularjane</strong>								for these awesome demo photos</a></h2>
								</header>
								<a href="#" class="image image-full"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/pic05.jpg';?>" /></a>
											<h3>You should probably check out her work</h3>
											<p>Phasellus laoreet massa id justo mattis pharetra. Fusce suscipit 
											ligula vel quam viverra sit amet mollis tortor congue. Sed quis mauris 
											sit amet magna accumsan tristique. Curabitur leo nibh, rutrum eu malesuada 
											in, tristique at erat lorem ipsum dolor sit amet lorem ipsum sed consequat 
											consequat magna tempus lorem ipsum consequat Phasellus laoreet massa id 
											in, tristique at erat lorem ipsum dolor sit amet lorem ipsum sed consequat 
											magna tempus veroeros lorem sed tempus aliquam lorem ipsum veroeros 
											consequat magna tempus lorem ipsum consequat Phasellus laoreet massa id 
											justo mattis pharetra. Fusce suscipit ligula vel quam viverra sit amet 
											mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique. 
											Curabitur leo nibh, rutrum eu malesuada in, tristique at erat.</p>
											<p>Erat lorem ipsum veroeros consequat magna tempus lorem ipsum consequat 
											Phasellus laoreet massa id justo mattis pharetra. Fusce suscipit ligula 
											vel quam viverra sit amet mollis tortor congue. Sed quis mauris sit amet 
											magna accumsan tristique. Curabitur leo nibh, rutrum eu malesuada in, 
											tristique at erat. Curabitur leo nibh, rutrum eu malesuada  in, tristique 
											at erat lorem ipsum dolor sit amet lorem ipsum sed consequat magna 
											tempus veroeros lorem sed tempus aliquam lorem ipsum veroeros consequat 
											magna tempus</p>
											<ul class="actions">
												<li><a href="#" class="button button-icon icon icon-file">Continue Reading</a></li>
											</ul>
										</article>
								
								</div>
								
							<!-- Sidebar -->
							<div id="sidebar" class="4u">
								
							<!-- Excerpts -->
							<section>
								<ul class="divided">
									<li>

									<!-- Excerpt -->
									<article class="is-excerpt">
										<header>
											<hgroup>
                                            	<h3 class="date">Diseño de páginas web</h3>
                                            </hgroup>
										</header>
                                        <a href="#" class="image image-left"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/fnd_dise.jpg';?>" /></a>
										<p>Contamos con una alta gama de páginas web para cada necesidad, desde económicas a proyectos personalizados.Más Info</p>
									</article>
									</li>
									<li>
									<!-- Excerpt -->
									<article class="is-excerpt">
										<header>
                                        	<hgroup>
											<h3 class="date">Mantenimiento Web</h3>
											</hgroup>
                                        </header>
											<p>Tenemos mantenimientos de Páginas Web acorde para la necesidad de cada empresa.</p>
									</article>
									</li>
									<li>

													<!-- Excerpt -->
														<article class="is-excerpt">
															<header>
																<span class="date">May 12, 2013</span>
																<h3><a href="#">Blerg persts er fern</a></h3>
															</header>
															<p>Lorem ipsum dolor odio facilisis convallis. Etiam non nunc vel est 
															suscipit convallis non id orci lorem ipsum sed magna consequat feugiat lorem dolore.</p>
														</article>

												</li>
											</ul>
										</section>
								
									<!-- Highlights -->
										<section>
										<ul class="divided">
										<li>
										<!-- Highlight -->
										<article class="is-highlight">
										<header>
											<h3>
                                            	<a href="#">Something of note</a>
                                            </h3>
										</header>
										<a href="#" class="image image-left"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/pic06.jpg';?>" /></a>
															<p>Phasellus  sed laoreet massa id justo mattis pharetra. Fusce suscipit ligula vel quam 
															viverra sit amet mollis tortor congue magna lorem ipsum dolor et quisque ut odio facilisis 
															convallis. Etiam non nunc vel est suscipit convallis non id orci. Ut interdum tempus 
															facilisis convallis. Etiam non nunc vel est suscipit convallis non id orci.</p>
															<ul class="actions">
																<li><a href="#" class="button button-icon icon icon-file">Learn More</a></li>
															</ul>
														</article>

												</li>
												<li>

													<!-- Highlight -->
														<article class="is-highlight">
															<header>
																<h3><a href="#">Something of less note</a></h3>
															</header>
															<a href="#" class="image image-left"><img src="<?php echo Yii::app()->theme->baseUrl.'/images/pic07.jpg';?>" /></a>
															<p>Phasellus  sed laoreet massa id justo mattis pharetra. Fusce suscipit ligula vel quam 
															viverra sit amet mollis tortor congue magna lorem ipsum dolor et quisque ut odio facilisis 
															convallis. Etiam non nunc vel est suscipit convallis non id orci. Ut interdum tempus 
															facilisis convallis. Etiam non nunc vel est suscipit convallis non id orci.</p>
															<ul class="actions">
																<li><a href="#" class="button button-icon icon icon-file">Learn More</a></li>
															</ul>
														</article>

												</li>
											</ul>
										</section>
								
								</div>

						</div>
					</div>

			</div>

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">

				<!-- Footer -->
					<div id="footer" class="container">
						<header>
							<h2>Questions or comments? <strong>Get in touch:</strong></h2>
						</header>
						<div class="row">
							<div class="6u">
								<section>
									<form method="post" action="#">
										<div class="row">
											<div class="6u">
												<input name="name" placeholder="Name" type="text" class="text" />
											</div>
											<div class="6u">
												<input name="email" placeholder="Email" type="text" class="text" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<textarea name="message" placeholder="Message"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<a href="#" class="button button-icon icon icon-envelope">Send Message</a>
											</div>
										</div>
									</form>
								</section>
							</div>
							<div class="6u">
								<section>
									<p>Erat lorem ipsum veroeros consequat magna tempus lorem ipsum consequat Phaselamet 
									mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique. Curabitur 
									leo nibh, rutrum eu malesuada.</p>
									<div class="row">
										<ul class="icons 6u">
											<li class="icon icon-home">
												1234 Somewhere Road<br />
												Nashville, TN 00000<br />
												USA
											</li>
											<li class="icon icon-phone">
												(000) 000-0000
											</li>
											<li class="icon icon-envelope">
												<a href="#">info@untitled.tld</a>
											</li>
										</ul>
										<ul class="icons 6u">
											<li class="icon icon-twitter">
												<a href="http://twitter.com/n33co">@untitled-tld</a>
											</li>
											<li class="icon icon-dribbble">
												<a href="http://dribbble.com/n33">dribbble.com/untitled-tld</a>
											</li>
											<li class="icon icon-facebook">
												<a href="#">facebook.com/untitled-tld</a>
											</li>
											<li class="icon icon-google-plus">
												<a href="#">google.com/+untitled-tld</a>
											</li>
										</ul>
									</div>
								</section>
							</div>
						</div>
					</div>

				<!-- Copyright -->
					<div id="copyright" class="container">
						Copyright &copy; <?php echo date('Y'); ?> by OdvSystem. Todos los derechos reservados.	<br />
		<?php echo 'Desarrollado por Virili Omar Dario (OdvSystem)'; ?>
                       
							
					</div>

			</div>

	</body>
</html>