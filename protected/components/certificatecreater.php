<?php 
	class certificatecreater extends CWidget
	{
		public $model;
		public $image;
		
		public function run()
		{	
			$this->render('certificateCreater',array('model' => $this->model,'image' =>$this->image));
		}
	}
 ?>