<?php 
class OCaracteresEspecialesHtml extends CWidget
{
	public $str='';
	public function init()
	{
		if (!isset($GLOBALS["carateres_latinos"]))
		{
			$todas = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES);
			$etiquetas = get_html_translation_table(HTML_SPECIALCHARS, ENT_NOQUOTES);
			$GLOBALS["carateres_latinos"] = array_diff($todas, $etiquetas);
		}
		$this->str = strtr($this->str, $GLOBALS["carateres_latinos"]);
		echo $this->str;
 
	}
}

?>