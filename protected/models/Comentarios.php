<?php

/**
 * This is the model class for table "comentarios".
 *
 * The followings are the available columns in table 'comentarios':
 * @property integer $id
 * @property integer $id_user
 * @property string $json
 */
class Comentarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comentarios the static model class
	 */
	private static $_comen=array();
	public $comentario;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comentarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_user, json', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, json', 'safe', 'on'=>'search'),
		);
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
			'id_user' => 'Id User',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('json',$this->json,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/*****************************************************************/
	#funciones de uso propio
	public static function setComentario($comen)
	{
		$_msj['comen']=$comen['comentario'];
		$_msj['fecha']= date('d-m-Y h:m:s',time());
		$_msj['name']= Yii::app()->user->name;
		self::$_comen = json_encode($_msj);
		//return $comen;
	}
	public static function getComentario()
	{
		return (self::$_comen);
		//return $comen;
	}
	/*****************************************************************/
	public function votar()
	{
		#obtengo el dni que guardo el usuario
		$model = Usuarios::model()->find('id='.Yii::app()->user->id);
		$dni = $model->dni;
		#con el dni obtenido lo busco en los ingreso y cheque que no voto todavia
		$dni= Ingresos::model()->tratarDni($dni);
		if($dni!=null){
		$model = Ingresos::model()->find('dni='.$dni);
		#si ya voto devuelvo la leyenda correspondiente y sino lo agrego el sorteo
		if(!($model))
		{
			$msj='';
			$model = new Ingresos;
			$model->dni=$dni;//$_POST['Ingresos'];
	  		date_default_timezone_set('America/Argentina/Buenos_Aires');
      		$model->fecha=date(DATE_ATOM,time());
			if($model->save())
			{
			$msj = 'SUERTE!!! usted ahora se encuentra participando en el sorteo Actual.';
			}
		}else{
			$msj='Usted ya se encuentra participando en este sorteo, SUERTE!!!';
			}
			//$dni =  str_replace('.','',$dni);
	  	
		}
		$this->render('votacion',array('model'=>$model,'msj'=>$msj,));
	}	
}