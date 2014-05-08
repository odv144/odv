<?php

class SorteoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	 
	 /* esta es la sintaxis de json para tabla sorteo, campo json
	 {"fecha":"fecha","json":[
		{"nro_orden":"1",
		"dni":"30729505",
		"ganador":"si"}]
	}
	 */
	public $layout='//layouts/main';

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
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','admin','delete','sortear','nuevosorteo','update','consultar'),
				'roles'=>array('Administrador','Programador'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','consultar'),
				'roles'=>array('Visitante'),
			),
			
			array('allow',
				 'actions'=>array('index','view','consultar','prueba'),
				 'users'=>array('*'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$model = Sorteo::getGanadores($id);
		$this->render($model[0],$model[1]);
		/*$this->render('view',array(
			'model'=>$this->loadModel($id),
		));*/
	}

	/****************************************************/
  //action que permite que cargue los datos del sorteo
  public function actionNuevoSorteo()
  {
   $model=new Sorteo;
   if(isset($_POST['Sorteo']))
	{
	  if(!$model->nuevoSorteo())
	  {
	  	echo 'error al copiar datos a tabla maestra';
	  }
	   $model->json=Sorteo::regSorteo($_POST['Sorteo']['iniSorteo'],$_POST['Sorteo']['finSorteo'],                				  $_POST['Sorteo']['premios']);
	if($model->save())
	  $this->redirect(array('index'));
	}
    //Yii::app()->format->formatDate('d-m-Y');
    $model->json = Sorteo::regSorteo(0,0,null);
	$this->render('ingreso',array(
			'model'=>$model,
		));
  }
  /****************************************************/
  public function actionSortear($id)
  {
   	$modSor= $this->loadModel($id);
    $msj = new StdClass;//variable para los mensajes
	$model = new Sorteo;
	$hecho=$model->setGanadores($modSor,$id,$msj);
	if(isset($hecho[2]))
	{$model = $hecho;
	}else{
		$model = Sorteo::getGanadores($id);
		}
	$this->render($model[0],$model[1]);
  }
	/****************************************************/
	public function actionConsultar($id)
	{
		$model=$this->loadModel($id);
		$json=json_decode($model->json);
		$iniSorteo = $json->iniSorteo;
		$finSorteo=$json->finSorteo;
		//programar el desarrollo para determinar si es un registro viejo o es el ultimo de los 
		//sorteo para determinar cual es la tabla a utilizar para mostrar
		$nro =Yii::app()->db->createCommand('SELECT MAX(id )AS id FROM sorteo')->query();
		//esta line me permite recuperar la fila del contenido anterior en un array
		$nro = $nro->read();
		if($nro['id'] == $id)
		{
			$modIng=new Ingresos;
		//$model = $model->filtroParticipantes($json);
		}else
		{
		$modIng = new Ingresostotales;
		}
		$this->render('view',array('modIng'=>$modIng,'id'=>$id,'iniSorteo'=>$iniSorteo,'finSorteo'=>$finSorteo));
	}
	/****************************************************/
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//public function actionUpdate($id)
	public function actionUpdate($id)
	{
		//$model=$this->loadModel(date('Y-m-d',time()));
    $model = $this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		/******************************************************/
		  if(isset($_POST['Sorteo']))
		 {
			
       		$json_tmp = new stdClass();
		    $iniF = new DateTime($_POST['Sorteo']['iniSorteo']);
        	$finF = new DateTime($_POST['Sorteo']['finSorteo']);            
        	$json_tmp='{"iniSorteo":"'.$iniF->format('d-m-Y').'",
                  "finSorteo":"'.$finF->format('d-m-Y').'",
                  "sorteado":"no",
                  "premios":"'.$_POST['Sorteo']['premios'].'"}';
			 $model->json =$json_tmp;
          if($model->save())
				  $this->redirect(array('index'));
		  }
           
			$this->render('update',array(
			'model'=>$model,
			));
		/******************************************************/
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
	public function actionIndex($id=null)
	{
		 $nro =Yii::app()->db->createCommand('SELECT MAX(id )AS id FROM premios')->query();
		//esta line me permite recuperar la fila del contenido anterior en un array
		$nro = $nro->read();
		//echo $nro['id'];
		 $model= Sorteo::model();
		 $this->render('index',array(
	   'model'=>$model,'id'=>$nro['id'],
		 ));
          
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sorteo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sorteo']))
			$model->attributes=$_GET['Sorteo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Sorteo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	// funcion que sirve para pruebas de action
	#*******************************************
	/*public function actionPrueba()
	{
		$model = new Ingresos;
		if($model->copiarIngreso())
		{
			Ingresos::vaciarIngresos();
			echo 'todo bien';
		}
		
	}
	*/
	#*******************************************
	
	 
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sorteo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>