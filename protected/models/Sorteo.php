<?php

/**
 * This is the model class for table "sorteo".
 *
 * The followings are the available columns in table 'sorteo':
 * @property integer $id
 * @property integer $nro_orden
 * @property string $dni
 */
class Sorteo extends CActiveRecord
{
	/**
     * 
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sorteo the static model class
	 */
	
     public $dni;
     public $nro_orden;
     public static $ganador=array();
     public $iniSorteo;
   	 public $finSorteo;
     public $sorteado;
     public $premios;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
  /*************************************************************/
  //metodo estatico que permite devolver si o no
  public static function getSorteo()
  {
    return array('NO','SI');
  }
  /*************************************************************/
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sorteo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
     /*
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nro_orden, dni', 'safe', 'on'=>'search'),
		);
	}*/

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'json' => 'Json',
		
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('json',$this->json);
	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
      'pagination'=>array(
          'pageSize'=>20,
          ),
		));
	}
	/****************************************************************************/
	public function nuevoSorteo()
	{
	 	$model = new Ingresos;
		if($model->copiarIngreso())
		{
			Ingresos::vaciarIngresos();
			return(true);
		}
		return (false);
	}
	/****************************************************************************/
	//FUNCION QUE DEVUELVE UN ARRAY DE GANADORES DEL SORTEO UNA VES REALIZADO
	public static function getGanadores($id)
	{
		  
      $modSor= Sorteo::model()->findByPk($id);
      $json = json_decode($modSor->json);
      $msj = new StdClass;//variable para los mensajes
     
      /*************************************************************/
     //determinar si el campo sorteado ya fue realizado
     	if(strtolower(($json->sorteado))=='si')
      	{
		$model = Ganadores::model()->findByPk($id);
			if($model === null)
			{
			$msj->error[]='El sorteo se realizo y luego se elimino, Consulte al administrador';
			}else{
				$json = json_decode($model->json);
				//redirecion a la pagiuna para mostrar los ganadores
				return array('verGanadores',array('json'=>$json,'msj'=>$msj,));
    		}
		}else{
			$msj->error[] = 'El sorteo aun no se a realizado, consulte proximamente';
			}
	return array('verGanadores',array('msj'=>$msj));
	}
   	/****************************************************************************/
	//CALCULAR LAS POSICIONES GANADORAS DE FORMA ALEATORIA
	public function  posAleatorio($premios, $canPar)
	{
	  $sorteo=array();
	 for($x=0;$x<$premios;$x++)
      {
        //array con numeros de orden ganadores
        do
		{
          $nro=mt_rand(0,($canPar-1));
        }while(in_array($nro,$sorteo));
        $sorteo[$x]= $nro; //(0,(count($filtro)-1));
      }
	 return $sorteo;
	}
	/****************************************************************************/
	//FUNCION QUE PERMITE FILTRAR LOS DNI DUPLICADOS
	public function filtradoDni($mod)
	{
	 $filtro = array();	
	 $repetidos = 0;
	 foreach($mod as $dato)
      {
        if (!(in_array(($dato['dni']),$filtro)))
        {
         
		  #$sql='DELETE FROM ingresos WHERE id = "'.$dato['dni'].'"';
		  $filtro[]=$dato['dni'];
        }else
        {
			$sql = 'select * from ingresos where id ="'.$dato['id'].'"';
		  $eli=Ingresos::model()->findBySql($sql);
		  /*print_r($eli);
		  Yii::app()->end();
		  */
		  $eli->delete();
          $repetidos++;
        }
      }
	  return array($filtro,$repetidos);
	}
	/****************************************************************************/
	public function filtroParticipantes($json)
	{
	 	$criteria=new CDbCriteria;
		$ini = new DateTime($json->iniSorteo);
		$ini = $ini->format('Y-m-d 00:00:00');
		$fin = new DateTime($json->finSorteo); 
		$fin = $fin->format('Y-m-d 23:59:59');
		
		$criteria->addBetweenCondition('fecha',$ini,$fin);
		//$criteria->addCondition("fecha = '$ini'",'OR');
		//$criteria->addCondition("fecha = '$fin'",'OR');
		//$model = new Ingresos;
		//$dataProvider = new CActiveDataProvider(Ingresos::model(),array('criteria'=>$criteria,)); 
		 $sql="select * FROM ingresos WHERE fecha BETWEEN '$ini' and '$fin'";
      	//$sql = "select * FROM ingresos WHERE '$iniF' > fecha AND fecha >'$finF'";
	 	 $model = Ingresos::model()->findAllBySql($sql);
		return $model;
				
	  
	/*
	 //$json=json_decode($json);
	  $iniF=new DateTime($json->iniSorteo);
      $iniF= $iniF->format('Y-m-d');
      $finF=new DateTime($json->finSorteo);
      $finF= $finF->format('Y-m-d');
      //$sql="select * FROM ingresostotales WHERE fecha BETWEEN '$iniF' and '$finF'";
      $sql="select * FROM ingresostotales WHERE fecha BETWEEN '$iniF' and '$finF'";
      //$sql = "select * FROM ingresos WHERE '$iniF' > fecha AND fecha >'$finF'";
	  $model = Ingresos::model()->findAllBySql($sql);
	   return $model;*/
	}
	/****************************************************************************/
	
	
	//FUNCION QUE PERMITE REALIZAR EL SORTEO Y GUARDAR LOS DATOS
	public function setGanadores($modSor,$id,$msj)
	{
		 //determinar si el campo sorteado ya esta en "si" o en "no"
    $json = json_decode($modSor->json);
	if(strtolower(($json->sorteado))=='no')
      {
      $model= $this->filtroParticipantes($json);
	  $total = count($model);
      if($total < $json->premios)
	  {	$msj->error[] = 'No se puede realizar el sorteo porque la cantidad de DNI es inferior a la de premios';
	  	return array('verGanadores',array('msj'=>$msj),true);
	  }
	  $devuelto = $this->filtradoDni($model);
	  $repetidos = $devuelto[1];
	  $filtro = $devuelto[0];
       /****************************************/
      /*armo una msj estandar con las leyendas*/
      //$msj='';
      $msj->total= $total;
      (isset($repetidos))? $msj->repetidos =$repetidos : $msj->repetidos = 0;
      $msj->participantes = count($filtro);
      /*******************************************************/
      /*realizo el calculo de los numeros de orden aleatorios*/
      $premios=$json->premios; //variable que tiene la cant de sorteos
     
	  $sorteo = $this->posAleatorio($premios,(count($filtro))); 
	  //utilizando el array de sorteo como indice obtengo los dni ganadores    
     
	  for ($x=0; $x<$premios;$x++)
      {
       $ganadores[]=$filtro[$sorteo[$x]];//variable que posee los ganadores y su premio
      }
     //modifico la variable sorteado a "si" para no volver a sortear
      $json->sorteado='si';
      $json->idSorteo=$id;
      $modSor->json=json_encode($json);
      if(!($modSor->save()))
      {
        //como se guardo bien debo copiar el arry a la tabla de ganadores
        //realizar para el futuro un widget para el guardar datos json en tabla mysql
        $msj->error[] = 'Error al guardar sorteo';
      }
    //echo 'se realizo el sorteo';
      $json = new stdClass;
      $json->fecha = date(DATE_ATOM,time());      
      $json->premios = $premios; //variable que cuarda los premios sorteados
      
      $gan = array();
      for ($x=0; $x<$premios;$x++)
      {
        //$ganadores[]=$filtro[$sorteo[$x]];//variable que posee los ganadores y su premio
        $dato = Ingresos::model()->find("dni='$ganadores[$x]'");
        $gan[] = '{"orden":"'.($x+1).'","dni":"'.$ganadores[$x].'","fecha":"'. $dato->fecha.'"}';
      }   
      
      $json->ganadores = $gan;
      $json->mensaje = $msj;
      $j = json_encode($json);
      //echo 'Muestrade datos en formato json<br>';
      //print_r($j);
      $modGan = new Ganadores;
      $modGan->json = $j;
      $modGan->id=$id;
      if(!($modGan->save()))
      { 
        $msj->error[] = 'Error al guardar los ganadores';
       //ahora paso el array de ganadores a la tabla de ganadores
      }
	  return true;
     }
	
	return false;
	}
	/****************************************************************************/
	//devuelve un objeto tipo json con el formato para guardar el sorteo
	#ini,fin -> son tipo fecha y hace referencia a inicio y fin de fecha de sorteo
	#sorteado -> tipo string que indica la realizacion del sorteo con 'si' o 'no'  
	#premios -> integer que indica la cantidad de premios a sortear
	public static function regSorteo($ini,$fin,$premios,$sorteado='no')
	{
	$json_tmp = new stdClass();
	$json_tmp='{"iniSorteo":"'.$ini.'",
                  "finSorteo":"'.$fin.'",
                  "sorteado":"'.$sorteado.'",
                  "premios":"'.$premios.'"}';
	return ($json_tmp);
	}
	/****************************************************************************/
	public static function ListadoPremios()
	{
		$premios[] =array('nro'=>'1','premio'=>'10 Pases Libres de Morocco para el viernes','sponsor'=>'Morocco Disco');
		$premios[] =array('nro'=>'2','premio'=>'5 Telebingo del Club Huracan','sponsor'=>'Club Huracan');
		
		
		return $premios;
	}
}

?>