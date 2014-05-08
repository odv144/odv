<?php

/**
 * This is the model class for table "ingresos".
 *
 * The followings are the available columns in table 'ingresos':
 * @property integer $id
 * @property string $dni
 * @property string $fehca
 */
class Ingresos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ingresos the static model class
	 */
   private static $flag='true';
   
   public static function getFlag()
   {
    return $this->flag;
   }
   public static function setFlag($f)
   {
    $this->flag=$f;
   }
   
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ingresos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('dni', 'required'),
			array('dni', 'length', 'max'=>10,'min'=>7),
			array('dni', 'miValidacion'), //revisar porque no anda al parecer la funcion
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dni, fecha', 'safe', 'on'=>'search'),
		);
	}
	
	public function miValidacion($attribute,$params)
	{
		$dni = $this->limpiarDni($this->dni);
		if (!(ctype_digit($dni)))
		{
			$this->addError('dni','el dni solo debe contener numeros');
		}
		 
	}
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
			'dni' => 'Dni',
			'fecha' => 'Fecha',
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
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
      'pagination'=>array(
          'pageSize'=>50,
      ),
 
 	));
	}
	/****************************************************************/
	public function copiarIngreso()
	{
		//creo modelo de Ingresos para buscar lo ingresos actuales
		$model = $this->model()->findAll();
		foreach($model as $dato)
		{
			//creo el modelo que contiene todos los dni
			$modIng = new Ingresostotales;
			//realizo las asignaciones de los campos
			$modIng->dni = $dato->dni;
			$modIng->fecha = $dato->fecha;
			$modIng->orden = $dato->id;
			//guardo y si da error salgo
			if(!($modIng->save()))
			{
			return (false);
			}
		}
		return(true);
		
	}
	/*****************************************************************/
	public function limpiarDni($dni)
	{
		$trat_dni =trim($dni);
	  	$trat_dni =  str_replace('.',' ',$trat_dni);
	  	$trat_dni =  str_replace(' ',null,$trat_dni);
		return ($trat_dni);
	}
	/****************************************************************/
	public static function AgregarPuntos($dni)
	{
		$tres = substr($dni,-3);
	  	$seis = substr($dni,-6,-3);
	  	$dni = str_replace($tres,'.'.$tres,$dni);
	  	$dni = str_replace($seis,'.'.$seis,$dni);
		return ($dni);
	}
	/***************************************************/
	//cuando termino el sorteo antes de empezar pongo a 0 la tabla
		public static function vaciarIngresos()
	  	{
		$sql='TRUNCATE TABLE `ingresos` ';
		//esta linea lo que hacees crear un comando sql y con execute lo
		//ejecuta y devuelve la cantidad de filas
		Yii::app()->db->createCommand($sql)->execute();
		//$model = Ingresos::model()->findBySql($sql);
		
	  	}
	/***************************************************/
}