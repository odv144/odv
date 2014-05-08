<?php

class IngresosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $flag;
  public $layout='//layouts/column2';

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
				'actions'=>array('index','view','create','update','delete',
								'admin','sortear','nuevo'),
				'roles'=>array('Administrador'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
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
		$model=new Ingresos;
    
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Ingresos']))
		{
			//$pages = new CPagination;
      $dni =trim($_POST['Ingresos']['dni']);
	  $dni = Ingresos::limpiarDni($dni);
	  $dni = $model->AgregarPuntos($dni);
	  $model->dni=$dni;//$_POST['Ingresos'];
	  date_default_timezone_set('America/Argentina/Buenos_Aires');
      $model->fecha=date(DATE_ATOM,time());
      //$mode->fecha=(date("Y-m-d H:i:s"));
	  if(!($model->save()))
			  $this->render('index',array('model'=>$model,
        ));
        //$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Ingresos']))
		{
			$model->attributes=$_POST['Ingresos'];
			if($model->save())
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
	   
    //poner algo por si esta vacia la tabla de ingreso
    $model= Ingresos::model();
	  $this->render('index',array(
			'model'=>$model,
		));
	}
 
  /**
  /***************************************************/
  //cuando termino el sorteo antes de empezar pongo a 0 la tabla
  /*
  public function actionPrueba()
  {
    //$flag='true';
    if($this->flag=='true')
    {
      echo 'variable es verdadera';
      $this->flag='false';
    } else
      {
        echo 'variable es falsa';
        $this->flag = 'true';
      }
  
  }*/
  /***************************************************
  /**
  *controlador del sorteo
   */
   /*
	public function actionSortear()
  {
    
    $model = Ingresos::model()->findAll();
    $filtro=array();
    $total = count($model);
    foreach($model as $dato)
    {
      if (!(in_array(($dato['dni']),$filtro)))
      {
        $filtro[]=$dato['dni'];
      }
    }
    $msj='';
    $msj.= 'Total de registro '.$total.'<br>';
    $repetidos = $total - (count($filtro));
    $msj.= 'Registros repetidos '. $repetidos.'<br>';
    $msj.= 'Registros participantes '. ($total - $repetidos) . '<br>';
    //realizar sorteo
    $sorteo=array();
    $premios=5;
    for($x=0;$x<$premios;$x++)
    {
      $sorteo[$x]= rand(0,($total - $repetidos - 1));
    }
    for ($x=0; $x<$premios;$x++)
    {
      $ganadores[]=$filtro[$sorteo[$x]];//variable que posee los ganadores y su premio
    }
   
    //print_r($sorteo);
    //print_r($ganadores);
    //guardar en una tabla el sorteo en formato json
    $json = new stdClass;
    $json->fecha = date(DATE_ATOM,time());
    //$json->premios = $premios; //variable que cuarda los premios sorteados
    $gan = '[';
     $x=0;
     foreach($model as $dato)
    {
      $gan .= '"'.$x.'","'.$ganadores[$x].'","'. $dato->fecha.'"';
      
      
      if (!(in_array(($dato['dni']),$filtro)))
      {
        $filtro[]=$dato['dni'];
      }
    }
    
    /*
    for($x=0;$x<$premios; $x++)
    {
      $gan .= '"'.$x.'","'.$ganadores[$x].'","'. ;
    }
    $gan = ']';
    $json->ganadores = $ganadores;
    $json->mensaje = $msj;
    $j = json_encode($json);
    //echo 'Muestrade datos en formato json<br>';
    //print_r($j);
    $modGan = new Ganadores;
    $modGan->json = $j;
    if($modGan->save())
    {
     // $this->redirect(array('view','id'=>$model->id));
      $this->render('verGanadores');
     
      //echo 'Guardo correctamente';
    }
  
   $this->render('verGanadores');
    //presentar datos
    //print_r($filtro);
  }
  */
  /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ingresos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ingresos']))
			$model->attributes=$_GET['Ingresos'];

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
		$model=Ingresos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='ingresos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
