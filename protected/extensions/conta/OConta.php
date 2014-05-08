<?php 
class OConta extends Cwidget
{
	public $contador;
	public function init()
	{
	echo '<h1>CONTADOR DE VISITAS</h1>';
	
	echo '<div id="contador">';
	$this->contador = substr($this->contador,-7);
	$cifra=$this->contador;
	for($x=0;$x<(strlen($this->contador));$x++)
	 {
	 $cifra = substr($this->contador,$x,1);  
	  echo '<img src="'.Yii::app()->theme->baseUrl.'/images/cont/'.$cifra.'.jpg">';
	 }
	echo '</div>';
	}
}
?>