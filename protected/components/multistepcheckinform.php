<?php 
	class multistepcheckinform extends CWidget
	{
		public $model;
		public $image;
		public $point;
		public function run()
		{	
			$this->render('multiStepChekinForm',array('model' => $this->model,'image' =>$this->image,'point' => $this->point));
		}
	}
 ?>