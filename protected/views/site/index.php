<h3>Dise&ntilde;o de P&aacute;ginas Web Econ&oacute;micas desde $700</h3>
<article class="cuadroPrincipal">
<img src="<?php print Yii::app()->theme->baseUrl .'/images/w300.jpg'; ?>" />
<span>
<strong>Web-700</strong> es la Solución que estabas esperando. Por solo $700 podrás tener tu propia página web.
Una Página web te permite comunicar tus productos y servicios con todo el país y con el resto del mundo, generandote innumerables posibilidades de crecimiento.
</span>
</article>
 <?php 
$x=0;

foreach($model as $dato){

echo '<article class="is-highlight">';

/*	
if(($x%2)==0){
	?>
    <div class="span-9 box box1">
   
<?php
}else{
	?>
	<div class="span-9 box box1 last">
	<?php
    }
*/	
$x++;

?>
	<header><h3><?php echo $dato->titulo;?></h3></header>
    <img class="image image-left" src="<?php print Yii::app()->theme->baseUrl .$dato->imagen.$x.'.jpg'; ?>" />
    <p>
	<?php 
   	$str=substr($dato->detalle,0,150).'<a href="/noticia/ver?id='.$dato->id.'">...LEER MAS</a>';
	echo $str;
	?>
    </p>
    </article>
<?php
}
?>
