<?php

class CertificateController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','bleat','imageSave'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'imageCrop','history','createcert','usualcert','checkincert','createcheckincert','anderson'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionbleat()
	{
		$userok = User::model()->findByPk(19);
		echo $userok->name;
		$users = array();
		$message = "Albek, za chekinsya v delpape, seichas.";
		array_push($users,$userok);
		foreach ($users as $user) 
			{
				
				$ok = true;
	            if ($ok == true) {
	            	 if($user->phone_type == 'ios')
	            	{

	            		$deviceToken = $user->deviceToken;					
						$passphrase = 'yourplace';
						$countCert = 69;
						$ctx = stream_context_create();
						stream_context_set_option($ctx, 'ssl', 'local_cert', Yii::app()->basePath.'/cknew.pem');
						stream_context_set_option($ctx, 'ssl', 'cafile', Yii::app()->basePath.'/entrust_2048_ca.cer');
						stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
						$fp = stream_socket_client(
							'ssl://gateway.push.apple.com:2195', $err,
							$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
																			
								$body['aps'] = array(								
									'alert' => $message,
									'badge' => $countCert,	
									'sound' => 'chime',
									
								);					
								$body['acme1'] = 'bar';
								$body['acme2'] = 42;
											

						// Encode the payload as JSON
						$payload = json_encode($body);

						// Build the binary notification
						$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

						// Send it to the server
						$result = fwrite($fp, $msg, strlen($msg));

						/*if (!$result)
							echo 'Message not delivered' . PHP_EOL;
						else
							echo 'Message successfully delivered' . PHP_EOL;
						*/
						// Close the connection to the server
						fclose($fp);	
						echo "thats all";
					}           
	            } 
	            if ($user->phone_type == 'android') {
						echo $user->name;
	            		$url = 'https://android.googleapis.com/gcm/send';
	            		$fields = array(
							'registration_ids' => array($user->deviceToken),
							'data' => array( "message" => $message ),
						);                       

			            $context = stream_context_create(array(
			                'http' => array(
			                    'method' => 'POST',
			                    'header' => "Authorization: key=AIzaSyCpyq3ehEr0eX0JrJAUQI4EREW5vNa6p8I\r\n".
			                                "Content-Type: application/json\r\n",
			                    'content' => json_encode($fields)
			                    )
						));


			            // Send request
			            $return = file_get_contents( $url, false, $context );        
			            //echo $return;
	            	}
			} 		
	}
	public function actionanderson()
	{
		echo "andeston";
		
	}

	public function actionimageCrop($id)
	{		
		$model = Images::model()->findByPk($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$x1 = $_POST['x1'];
		$x2 = $_POST['x2'];
		$y1 = $_POST['y1'];
		$y2 = $_POST['y2'];
		$width = $_POST['width'];
		$height = $_POST['height'];
                $type = $_POST['type'];
		if (isset($x1)) {
			$imagePath ='http://admin.yourplace.kz/images/'.$model->img_id.'-image-certificate.'.$model->extension;
                        $im2 = Yii::app()->basePath . '/../images/'.$model->img_id.'-image-certificate.'.$model->extension;

			//if (file_exists($imagePath)) {				
				Yii::import('ext.EWideImage.EWideImage');				
				$file2 = EWideImage::loadFromFile($imagePath)->crop($x1, $y1, ($x2-$x1), ($y2-$y1));
				$file2->saveToFile($im2);
			//}
                 }
      	$this->render('imageCrop',array(
			'model'=>$model,
		));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	

	public function actionHistory()
	{
		$cid = Yii::app()->user->id;
		$certs = Certificate::model()->findBySql('SELECT * from certificate where cid = '.$cid.' order by cert_id DESC ');
		$user = Client::model()->findByPk(Yii::app()->user->id);
		$isallowed = $user->isAbleCreateCert();
		
		$this->render('history',array(
		'cid' => $cid,	
		'certs' => $certs,
		'isallowed' =>$isallowed,
		));		
	}
	public function actionView($id)
	{
		$image = new Images;
        $image->owner_id = $id; 
        $image->type = 'image-certificate';
        //////////////////////////////////////////rrrrrrrrrrrrrrrrrrrrrr
		$place=new PlaceCertificate;
		$place->cert_id = $id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['PlaceCertificate']))
		{
			$place->attributes=$_POST['PlaceCertificate'];
			
			if($place->save()){
				Yii::app()->user->setFlash('success', "Место успешно добавлено!");				
			}
			else
				Yii::app()->user->setFlash('fail', "Произошла ошибка при добавлении");					
		}

		if(isset($_POST['Images']))
		{
			$image->attributes=$_POST['Images'];
			$file1=CUploadedFile::getInstance($image,'extension');			
			if ($file1 != null) {
				$image->extension = $file1->getExtensionName();
				if($image->save()){
					$file1->saveAs(Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension);
					Yii::app()->user->setFlash('success2', "Изображение успешно добавлено!");				
				}
				else
					Yii::app()->user->setFlash('fail2', "Произошла ошибка при добавлении");					
			}
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'place'=>$place,
			'image'=>$image
		));
	}
	//creating ussual offer wizard
	public function actioncreateCert($number=NULL)
	{


		$model=new Certificate();
		$model->usualize();
		$point = new Place();
		$point->longitude = 40; 
		$point->latitude = 30;
		$point->home_number = 10;
		$point->cid = 10;
		$image = new Images;
		$this->performAjaxValidation(array($model));
		$user = Client::model()->findByPk(Yii::app()->user->id);
		if($user->isAbleCreateCert())
		{
			if(isset($_POST['Certificate']))
			{
				
				$model->attributes=$_POST['Certificate'];
				$model->time_begin = strtotime($model->time_begin);
				$model->time_end = strtotime($model->time_end);
				$model->time_deactive = strtotime($model->time_deactive);
				if ($model->limitNumber == 0) {
					$model->number = 0;
				}
				else if ($model->number == 0) {
					$model->limitNumber = 0;
				}
				if($number != null) $model->pushType = $number+5;
				if($model->save())
				{
					$place=new PlaceCertificate;
					$place->usualize($model->cert_id,$model->cid);
	        		if(isset($_POST['Images']))
					{
						$image->type = 'image-certificate';
						$image->owner_id = $model->cert_id; 
						$image->attributes=$_POST['Images'];
						$file1=CUploadedFile::getInstance($image,'extension');			

						if ($file1 != null) 
						{
							$image->extension = $file1->getExtensionName();
							if($image->save())
							{
								if(isset($_POST['Place']))
								{
									$point->attributes = $_POST['Place'];
								}
								Yii::import('ext.EWideImage.EWideImage');				
								$file1->saveAs(Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension);
								$size = getimagesize(Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension);
								$ratio = $size[1]/300.0;
								$x1 = round($ratio*$point->home_number);
								$y1 = round($ratio*$point->cid);
								$width = round($ratio*$point->longitude);
								$height = round($ratio*$point->latitude);
								$imagePath =Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension;
								$file2 = EWideImage::loadFromFile($imagePath)->crop($x1,$y1 ,$width,$height);
								$file2->saveToFile($imagePath);
							}
						}	
					}		


					$this->redirect(array('view','id'=>$model->cert_id));
				}
			}
		}
		else
		{
			if(isset($_POST['Certificate']))
				$this->redirect('gotohellbitch.com');
		}
		$this->render('createcert',array(
			'model'=>$model,
			'image'=>$image,
			'point'=>$point,
			
		));
	}

	//creating checking offer wizard
	public function actioncreateCheckinCert()
	{
		$model=new Certificate();
		$model->checkinize();
		$point = new Place();
		$point->longitude = 40; 
		$point->latitude = 30;
		$point->home_number = 10;
		$point->cid = 10;
		$image = new Images;
		$this->performAjaxValidation(array($model));
		$user = Client::model()->findByPk(Yii::app()->user->id);
		
			if(isset($_POST['Certificate']))
			{
				
				$model->attributes=$_POST['Certificate'];
				$model->time_begin = strtotime($model->time_begin);
				$model->time_end = strtotime($model->time_end);
				$model->time_deactive = strtotime($model->time_deactive);
				if ($model->limitNumber == 0) {
					$model->number = 0;
				}
				else if ($model->number == 0) {
					$model->limitNumber = 0;
				}
				if($model->save())
				{
					$place=new PlaceCertificate;
					$place->usualize($model->cert_id,$model->cid);
	        		if(isset($_POST['Images']))
					{
						$image->type = 'image-certificate';
						$image->owner_id = $model->cert_id; 
						$image->attributes=$_POST['Images'];
						$file1=CUploadedFile::getInstance($image,'extension');			

						if ($file1 != null) 
						{
							$image->extension = $file1->getExtensionName();
							if($image->save())
							{
								if(isset($_POST['Place']))
								{
									$point->attributes = $_POST['Place'];
								}
								Yii::import('ext.EWideImage.EWideImage');				
								$file1->saveAs(Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension);
								$size = getimagesize(Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension);
								$ratio = $size[1]/300.0;
								$x1 = round($ratio*$point->home_number);
								$y1 = round($ratio*$point->cid);
								$width = round($ratio*$point->longitude);
								$height = round($ratio*$point->latitude);
								$imagePath =Yii::app()->basePath . '/../images/' . $image->img_id . '-'.$image->type.'.'. $image->extension;
								$file2 = EWideImage::loadFromFile($imagePath)->crop($x1,$y1 ,$width,$height);
								$file2->saveToFile($imagePath);
							}
						}	
					}		


					$this->redirect(array('view','id'=>$model->cert_id));
				}
			}
		$this->render('createcheckincert',array(
			'model'=>$model,
			'image'=>$image,
			'point'=>$point,
			
		));
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function actionCreate($id=NULL,$offer_type)
	{
		$model=new Certificate;
		$model->usualize();
		
		if($offer_type == "checkin") 
		{
			$model->age_max = 100;
			$model->age_min = 0;
			$model->attend_max = 100;
			$model->attend_min = 0;
			$model->mark_max = 100;
			$model->mark_min = 0;
			$model->star_max = 5;
			$model->star_min = 0;
			$model->fb_max = 100;
			$model->fb_min = 0;
			$model->number = 0;
			$model->numberPerAccount = 1;
			$model->pushType = 0;
		}
		if (isset($id)) {
			$model->cid = $id;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Certificate']))
		{
			$model->attributes=$_POST['Certificate'];
			$model->time_begin = strtotime($model->time_begin);
			$model->time_end = strtotime($model->time_end);
			$model->time_deactive = strtotime($model->time_deactive);
			if ($model->limitNumber == 0) {
				$model->number = 0;
			}
			else if ($model->number == 0) {
				$model->limitNumber = 0;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->cert_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'offer_type'=>$offer_type,
		));
	}

	//new usual offer tab
	public function actionusualCert()
	{
		$link = '#';
		$user = Client::model()->findByPk(Yii::app()->user->id);
		$active = array();

		$active = $user->activeCerts();
		$inactive = $user->inactiveCerts();
		if($user->isAbleCreateCert())
		{
			$link = 'createcert';
		}
		$this->render('usualcert',array('link' =>$link,'active' => $active,'inactive' =>$inactive));
	}

	//new checking offer tab
	public function actioncheckinCert()
	{
		
		$user = Client::model()->findByPk(Yii::app()->user->id);
		$active = array();
		$active = $user->activeCheckinCerts();
		$inactive = $user->inactiveCheckinCerts();
		$link = 'createcheckincert';
		$this->render('checkincert',array('link' =>$link,'active' =>$active,'inactive' =>$inactive));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->time_begin = Yii::app()->dateFormatter->format('dd.MM.yyyy HH:mm', $model->time_begin);
		$model->time_end = Yii::app()->dateFormatter->format('dd.MM.yyyy HH:mm', $model->time_end);	
		$model->time_deactive = Yii::app()->dateFormatter->format('dd.MM.yyyy HH:mm', $model->time_deactive);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Certificate']))
		{
			$model->attributes=$_POST['Certificate'];
			$model->time_begin = strtotime($model->time_begin);
			$model->time_end = strtotime($model->time_end);
			$model->time_deactive = strtotime($model->time_deactive);
			if ($model->limitNumber == 0) {
				$model->number = 0;
			}
			else if ($model->number == 0) {
				$model->limitNumber = 0;
			}
			if($model->save())
			{

				$this->redirect(array('view','id'=>$model->cert_id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Certificate');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Certificate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Certificate']))
			$model->attributes=$_GET['Certificate'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Certificate the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Certificate::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Certificate $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}