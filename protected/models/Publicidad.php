<?php

/**
 * This is the model class for table "publicidad".
 *
 * The followings are the available columns in table 'publicidad':
 * @property integer $id
 * @property string $empresa
 * @property string $imagen
 */
class Publicidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Publicidad the static model class
	 */
	public static $publiLarga;
	public $img='';
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	 /***************************************************/
	 public static function getPubliLarga()
	 {
		return(self::$publiLarga);
		
	 }
	 #funcion que permite setear un array de publicidades 
	 /***************************************************/
	 public static function setPubli($med='1')
	 {
		self::$publiLarga = Publicidad::model()->findAll("medida='$med'");
		
	 }
	 /***************************************************/
	 public function getMedidas()
	 {
		return array('1'=>'Largo','2'=>'Ancho');	 
	}
	public function tableName()
	{
		return 'publicidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('empresa, imagen', 'required'),
			array('empresa', 'length', 'max'=>100),
			array('img', 'file', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, empresa, imagen', 'safe', 'on'=>'search'),
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
			'empresa' => 'Empresa',
			'imagen' => 'Imagen',
			'medida' => 'Medida',
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
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('imagen',$this->imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt()
	{
		return uniqid('',true);
	}


}

