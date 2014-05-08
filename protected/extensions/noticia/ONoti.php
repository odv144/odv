<?php
class ONoti extends CWidget
{
	public $noticia=''; //variable que permite la relacion con el exteriro de noticia
	public $camara='';	//para camara
	public $id='';
	public function init()
	{
    echo '<div class="column1-unit">';
	if($this->id != null)
    {
        
     
        //esta seccion permite mostrar una unica noticia dependiendo del id recibido
        echo '<h1>'.strtoupper($this->noticia->titulo).'</h1>';
        ($this->noticia->imagen)? $img=$this->noticia->imagen->link_img:$img='/images/nada.jpg';
        echo '<h1><img src="'.Yii::app()->theme->baseUrl . $img . '" /></h1>';
        echo '<h3 class="side"></h3>';
        $str=$this->noticia->noticia;
		echo '<p>';
        $this->widget('ext.noticia.OCaracteresEspecialesHtml',array(
		'str'=>$str,
		));
        
		echo '<p class="details">Editor: '.$this->noticia->editor->nombre .'|Fecha: '
            .$this->noticia->fecha.'|Visitas: '.$this->noticia->canVisita.'</p>';
		echo '</p>';
      /****
      echo '<h1>noticia </h1>'.$this->id;
      echo '<div>'.$this->noticia->noticia.'</div>';
      */
    }else
       {
      
       foreach($this->noticia as $noti)
	   {
        //esta seccion sirve para mostrar todas las noticias juntas 
		echo '<h1>'.strtoupper($noti->titulo).'</h1>';
	   //echo '<p><img src="'.Yii::app()->theme->baseUrl .'/images/im.jpg" />';
		/**condicional que permite determinar si existe el lin de la imagen se le asigna sino 
		se le asigna el nombre de una imagen por defecto 
		*/
        $imagen=Imagenes::model()->findByPk($noti->imagenes_id);
        
        
        ($imagen->link_img)? $img=$imagen->link_img:$img='/images/nada.jpg';
		
        echo '<p><img src="'.Yii::app()->theme->baseUrl . $img . '" />';
		
		//$str= substr($noti->noticia,0,150).'<a href="/noticia/ver?id='.$noti->id.'">...LEER MAS</a>';
		$str=substr($noti->noticia,0,150).CHtml::link('...LEER MAS', array('noticia/ver', 'id'=>$noti->id));
		$this->widget('ext.noticia.OCaracteresEspecialesHtml',array(
		'str'=>$str,
		));
		//echo '<p class="details">Editor: '.$noti->editor->nombre .'|Fecha: '.$noti->fecha.'|Visitas: '.$noti->canVisita.'</p>';
		 echo '</p>';
	   }  
        
    }
    
	echo '</div>';
	}
}
?>