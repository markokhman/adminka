<?php 
	class multistepform extends CWidget
	{
		public $model;
		public $image;
		public $point;
		public function run()
		{	
			$this->render('multiStepForm',array('model' => $this->model,'image' =>$this->image,'point' => $this->point));
		}
	}
 ?>