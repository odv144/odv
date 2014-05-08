<?php

class UsuariosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','cuenta','update'),
				'roles'=>array('Visitantes'),
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','view','update','create','index','cuenta','enviar','enviarsmtp'),
				'roles'=>array('Administrador','Programador'),
			),
			array('allow',
				 'actions'=>array('create'),
				 'users'=>array('*'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/********************************************************/
	//action para listar la cuenta de un usuario especifico logeado
	public function actionCuenta()
	{
		echo Yii::app()->user->name;
	}
	/********************************************************/
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			//asigno un valor para la session
			$model->password_2=$model->hashPassword($_POST['Usuarios']['password_2'],$session=$model->generateSalt());
			$model->session=$session;
			if($model->save())
				/***********************************************/
				//permite asignar el rol al usuario que se esta registrando
				$auth=Yii::app()->authManager;
				$rol='Visitante';				
				$auth->assign($rol,$model->id);
				/***********************************************/
				
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			
			$model->password_2=$model->hashPassword($_POST['Usuarios']['password_2'],$session=$model->generateSalt());
			$model->session=$session;
			if($model->save())
			/*if(Yii::app()->authManager->checkAccess('administrador',Yii::app()->user->id ))
			{
				echo "siiii";
			}else
				{
				echo "nooo";
				}
				
			*/	
			/**********************************************
			$auth=Yii::app()->authManager;
			/*$auth->createOperation('usuario_limitado','limita al usuario');
			$tash=$auth->createTask('limitada','Tarea para limitar usuarios');
			$tash->addChild('usuario_limitado');
			
			$role->addChild('limitada');
			//agrego a la tabla authassigment
			
			//$role=$auth->createRole('rol_limitado','Permiso basicos');
			
			$auth->assign('administrador',$model->id); */
			/***********************************************/
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$dataProvider=new CActiveDataProvider('Usuarios');
		/*$auth = Yii::app()->authManager;
		echo '<pre>';
		print_r($auth->getRoles());
		echo '</pre>';
		Yii::app()->end();
		*/
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/*********************************************/
	public function actionEnviar()
	{
		$this->layout='//layouts/email_main';
		$model = new Usuarios;
		$dato=$model->armarEnvioMail();
		if($dato){
		$json=$dato[0][1]['json'];
		$direccion=	$dato[1];
		#echo $direccion;
		#Yii::app()->end();
		$cuerpo=$this->render('/sorteo/mailImg',array('json'=>$json),true);
		$email=$model->enviarMail($cuerpo,$direccion);
				
		$msj='El listado de ganadores fue enviado correctamente a la lista de usuarios Registrados';
		if(count($email)>0)
		{
			$msj='El listado de ganadores no se enviado por algun error consulte al Administrador';
		}
		$this->render('/sorteo/mailImg',array('json'=>$json,'msj'=>$msj));
		}else{
			
			$msj->error[]='No se puede enviar ya que no se realizo el sorteo todavia';
			$this->render('/sorteo/mailImg',array('msj'=>$msj));
			
			}
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
