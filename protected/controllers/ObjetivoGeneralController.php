<?php

class ObjetivoGeneralController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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
				'actions'=>array('autocompletesearch'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete','cambiarestatus','dashboardporobjetivogeneral'),
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
		$model=new ObjetivoGeneral;
		$persona = $this->devuelvePersonaActual();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ObjetivoGeneral']))
		{
			$model->attributes=$_POST['ObjetivoGeneral'];
			$model->persona_aid = $persona->id;
			$model->planeacion_did = $_GET['planeacion_did'];
			$model->departamento_did = $persona->departamento_did;
			$estrategias = $_POST['estrategias'];			
			if($model->save())
			{
				if(count($estrategias)>0)
				{
					foreach($estrategias as $estrategia)
					{
						$modelEstrategiaObjetivo = new EstrategiaObjetivogeneral;
						$modelEstrategiaObjetivo->estrategia_did = $estrategia;
						$modelEstrategiaObjetivo->objetivoGeneral_did = $model->id;
						$modelEstrategiaObjetivo->save();
					}
				}
				$this->redirect(array('site/index'));
			}
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
		$modelEstrategiaObjetivo = EstrategiaObjetivogeneral::model()->findAll('objetivoGeneral_did = ' . $model->id);
		//Me quedé haciendo el actualizar para el objetivo General
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ObjetivoGeneral']))
		{
			$model->attributes=$_POST['ObjetivoGeneral'];
			$estrategias = $_POST['estrategias'];
			$existen = EstrategiaObjetivogeneral::model()->exists('objetivoGeneral_did = ' . $model->id);
			if($existen == true)
				EstrategiaObjetivogeneral::model()->deleteAll('objetivoGeneral_did = ' . $model->id);
				
			if($model->save())
			{
				if(count($estrategias)>0)
				{
					foreach($estrategias as $estrategia)
					{
						$modelEstrategiaObjetivo = new EstrategiaObjetivogeneral;
						$modelEstrategiaObjetivo->estrategia_did = $estrategia;
						$modelEstrategiaObjetivo->objetivoGeneral_did = $model->id;
						$modelEstrategiaObjetivo->save();
					}
				}
				$this->redirect(array('site/index'));
			}
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
		$dataProvider=new CActiveDataProvider('ObjetivoGeneral');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ObjetivoGeneral('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ObjetivoGeneral']))
			$model->attributes=$_GET['ObjetivoGeneral'];

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
		$model=ObjetivoGeneral::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='objetivo-general-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionAutocompletesearch()
	{
	    $q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
			$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	       	$cursor = ObjetivoGeneral::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	public function devuelvePersonaActual()
	{
		$usuario = Usuario::model()->find('usuario="' . Yii::app()->user->name .'"');
		$persona = Persona::model()->find('usuario_did = ' . $usuario->id);
		return $persona;
	}
	
	public function actionCambiarestatus($id)
	{
		$model=$this->loadModel($id);	
			
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		if($model->estatus_did == 1)
			$model->estatus_did = 2;
		else
			$model->estatus_did = 1;
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		if($model->save()){
			$this->redirect(array('site/index'));
		}
	}
	
	public function actionDashboardporobjetivogeneral()
	{		
		$this->render('dashboardporobjetivogeneral');
	}
}
