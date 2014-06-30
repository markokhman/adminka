<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>


<div class="wrapper">
   <?php 
   		$this->widget('usermenu');
 	?>
	<div class="content" id="container">
	<?php
		//$this->widget('lastdata');
		$this->widget('multistepform',array('model'=>$model,'image' =>$image,'point' => $point));       
	?>
	</div>
</div>	  