<?php 
//compenent for left tab navigation menu
class lastdata extends CWidget
{
	public function run()
	{
		$user = Client::model()->findByPk(Yii::app()->user->id);
		$this->render('lastdata',array('user' => $user));
		
	}

}

 ?>
