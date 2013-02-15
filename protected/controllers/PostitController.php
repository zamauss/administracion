<?php

class PostitController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','cambiarestatus','archivar'),
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
		
		
		if(isset($_GET['tipoPostit']))
		{
			$model=new Postit;
			$model->tipoPostit_did = $_GET['tipoPostit'];
			$model->personaRemitente_aid = $_GET['pid'];
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Postit']))
		{
			$destinatarios = $_POST['Postit']['personaDestinatario_aid'];
			//echo '<pre>'; print_r($_POST); echo '</pre>';
			//exit;
			foreach($destinatarios as $destinatario)
			{
				$model=new Postit;
				$model->tipoPostit_did = $_GET['tipoPostit'];
				$model->personaRemitente_aid = $_GET['pid'];				
				$model->attributes=$_POST['Postit'];
				$model->estatus_did = 1;
				$model->personaDestinatario_aid = $destinatario;
				$model->save();
				//aquí voy a mandar la info
				if(isset($_POST['notificar']))
				{					
					$this->avisarResponsable($model->personaDestinatario->correo, $model->nombre, $model->id);
				}
			}
			
			
			
			$this->redirect(array('site/index'));
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

		if(isset($_POST['Postit']))
		{
			$model->attributes=$_POST['Postit'];
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
		$dataProvider=new CActiveDataProvider('Postit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Postit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Postit']))
			$model->attributes=$_GET['Postit'];

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
		$model=Postit::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='postit-form')
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
	       	$cursor = Postit::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	public function actionCambiarestatus($id)
	{
		$model=$this->loadModel($id);	
			
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		if($model->estatus_did == 1 || $model->estatus_did == 3)
			$model->estatus_did = 2;
		else
			$model->estatus_did = 1;
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		if($model->save()){
			$this->redirect(array('site/index'));
		}
	}
	
	public function actionArchivar($id)
	{
		$model=$this->loadModel($id);	
			
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		$model->estatus_did = 3;
		//echo '<pre>'; print_r($model->attributes); echo '</pre>';
		if($model->save()){
			$this->redirect(array('site/index'));
		}
	}
	
	public function avisarResponsable($to, $body, $id)
	{
		$headers = array(
		    'MIME-Version: 1.0',
		    'Content-type: text/html; charset=UTF-8'
		);
		$model=$this->loadModel($id);
		Yii::app()->email->send('Post-it Robot',$to,$model->personaRemitente->nombre . ' te ha dejado un postit',
											'Soy el sistema de administración, notificándote que te han dejado un Post-it con 
											la siguiente información.<br/><br/>' .
											'<strong>Tipo del post-it:</strong> ' . $model->tipoPostit->nombre . 
											' <br/><br/><br/> <strong>Mensaje:</strong> ' . $model->nombre .
											'<br/><br/><br/><br/>' . 
											'<strong>Nota: </strong> Por favor, no conteste este correo ya que fue enviado por el sistema', $headers);
	}
}
