<div class = "wrapper">
	<?php $this->widget('usermenu'); ?>
	<div class="content" id="container">
		<?php $this->widget('lastdata');?>
		<div style = "border:1px solid #696969;height:50px;margin: 10px 0px 0px 0px;">
			<a href="<?php echo $link; ?>" id ="alert"><img src="../images/plus.png" style = "height:50px;float:left;"> <h5 style = "float:left; margin: 16px 0px 0px 0px;padding-right:496px;color:#424242;">Создать чекин предложение</h5> </a>
		</div>
		<div class = "widget" style = "margin-top:20px;">
			<div class="head"><h5 class="iList">Действующие чекин предложения</h5></div>
			<?php foreach($active as $cert) {?>
			<div class="rowElem">
				<a href="view/id/<?php echo $cert->cert_id; ?>"> <p style = "color:#424242;"> <?php echo $cert->name ?> </p></a>
			</div>
			<?php } ?>
			<?php 
				if(count($active) == 0) {
			 ?>
			 <div class = "rowElem">
			 	Пока что пусто...
			 </div>
			 <?php 
			 } ?>
			 <div class="head"><h5 class="iList">Недействующие чекин предложения</h5></div>
			<?php foreach(array_reverse($inactive) as $cert) {?>
			<div class="rowElem">
				<a href="view/id/<?php echo $cert->cert_id; ?>"> <p style = "color:#424242;"> <?php echo $cert->name ?> </p></a>
			</div>
			<?php } ?>
			<?php 
				if(count($inactive) == 0) {
			 ?>
			 <div class = "rowElem">
			 	Пока что пусто...
			 </div>
			 <?php 
			 } ?>
		</div>
	</div>
	
</div>