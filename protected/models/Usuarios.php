<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property string $id
 * @property string $nick
 * @property string $password_2
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string $tip
 *
 * The followings are the available model relations:
 * @property Pedidos[] $pedidoses
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	
  public static function model($className=__CLASS__)
  {
	  return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
	  return 'usuarios';
  }
  
  public static function getRol()
  {
	  return array('Visitante');
	  //return array('Visitante','Administrador');
  }
  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
	  // NOTE: you should only define rules for those attributes that
	  // will receive user inputs.
	  return array(
		  array('session, password_2, dni','required'),
		  array('nick', 'length', 'max'=>10),
		  array('nombre, apellido', 'length', 'max'=>50),
		  array('direccion', 'length', 'max'=>100),
		  array('telefono', 'length', 'max'=>15),
		  array('email', 'length', 'max'=>80),
		  //array('tip', 'length', 'max'=>5),
		  // The following rule is used by search().
		  // Please remove those attributes that should not be searched.
		  array('id, nick, password_2, nombre, apellido, direccion, telefono, email, tip, session', 'safe', 'on'=>'search'),
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
		  'pedidoses' => array(self::HAS_MANY, 'Pedidos', 'usuarios_id'),
	  );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
	  return array(
		  'id' => 'ID',
		  'nick' => 'Nick',
		  'password_2' => 'Password 2',
		  'dni'=>'D.N.I.',
		  'nombre' => 'Nombre',
		  'apellido' => 'Apellido',
		  'direccion' => 'Direccion',
		  'telefono' => 'Telefono',
		  'email' => 'Email',
		  'tip' => 'Tip',
		  
		  
	  );
  }
  public function validatePassword($password)
  {
	  return $this->hashPassword($password,$this->session)===$this->password_2;
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

  /* Generates a salt that can be used to generate a password hash.*/
  public function generateSalt()
  {
	  return uniqid('',true);
  }
  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models based on the 		search/filter conditions.
   */
   /*******************************************************************************/
   public function armarEnvioMail()
  {
	   $model = Usuarios::model()->findAll();
	  $direccion='omar_virili@hotmail.com';
	  foreach($model as $dato)
	  {
		  if($dato->email!= NULL )
		  {
		  $direccion .= ','.$dato->email; 
		  }
	  }
		  
	  #$nro = Yii::app()->db->createCommand('SELECT MAX(id )AS id FROM sorteo')->query();
	  $sql = 'SELECT MAX(id )AS id FROM sorteo';
	  $nro = Sorteo::model()->findBySql($sql);
	  $sql = 'SELECT MAX(id)AS id FROM ganadores';
	  $gana = Ganadores::model()->findBySql($sql);
	 
	  if($nro['id'] == $gana['id']){
	  	$model = Sorteo::getGanadores($nro['id']);
	  	return array($model,$direccion);
	  }else
	  	{
		return false;
		}
	  }
  /************************************************************************/
  public function enviarMail($cuerpo,$correos)
  {
	Yii::import("application.extensions.Mailer.*");
	
	//$mail->AddAddress($correos);
	//$correos=array('omar.virili@gmail.com','odv@vocampo.com.ar');
//$correos=array('omar.virili@gmail.com','omar_dario_virili@yahoo.com.ar');
	//$mail->AddAddress($correos); // Mail destino, podemos agregar muchas direcciones
	//$mail->AddCC('<omar_virili@hotmail.com>,<omar_dario_virili@yahoo.com.ar>');
	//$mail->AddBCC('omar.virili@gmail.com'); // Esta es la dirección a donde enviamos
	
	//$mail->IsSMTP(true);
	//$mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False
	//$mail->Username = "omar.virili@gmail.com"; // Cuenta de e-mail
	//$mail->Password = "odv144"; // Password
	//$mail->Helo='localhost.localdomain';
	//$mail->Port = '2525';
	//$mail->Host = "mx1.ekiwi.es";
	
	//$mail->Host='localhost';
	/**************************/
	
	$correos=explode(',',$correos);
	//$correos='omar.virili@gmail.com';
	
	for($x=0;$x<(count($correos));$x++)
	{
	
	$mail= new phpmailer();
	$mail->From = "admin@onda100.com.ar"; // Desde donde enviamos (Para mostrar)
	$mail->FromName = 'Onda 100'; // Nombre del que envia	
	$mail->AddAddress($correos[$x]);
	$mail->WordWrap = 50; // Largo de las lineas
	$mail->IsHTML(true); // Podemos incluir tags html	
	$mail->Subject='Ganadores del Sorteo';
	$mail->AltBody=strip_tags($mail->Body); // Este es el contenido alternativo sin htm	
	$mail->Body=$cuerpo;
	if(!($mail->Send())){	$mailMal[]=$correos[$x];}
	}
	
	return($mailMal);	
  
	/*
	$mail->Body=$cuerpo;
	return($mail->Send());
	//$cuerpo = $this->render('/sorteo/mailImg',array('img'=>$img),true);
	*/
 }
  /*******************************************************************************/
  public function search()
  {
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.
  
	$criteria=new CDbCriteria;
  
	$criteria->compare('id',$this->id,true);
	$criteria->compare('nick',$this->nick,true);
	$criteria->compare('password_2',$this->password_2,true);
	$criteria->compare('dni',$this->dni,true);
	$criteria->compare('nombre',$this->nombre,true);
	$criteria->compare('apellido',$this->apellido,true);
	$criteria->compare('direccion',$this->direccion,true);
	$criteria->compare('telefono',$this->telefono,true);
	$criteria->compare('email',$this->email,true);
	$criteria->compare('tip',$this->tip,true);
  
	return new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
	));
  }
  /*******************************************************************************/
}