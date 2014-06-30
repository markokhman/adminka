
<link rel="stylesheet" href="../css/widget/alertify.core.css" />
<link rel="stylesheet" href="../css/widget/alertify.default.css" id="toggleCSS" />
<div class = "wrapper">
<?php 
	$this->widget('usermenu');
?>
	<div class="content" id="container">
		<?php $this->widget('lastdata');?>
		<div id="walom"> </div>
		<div style = "border:1px solid #696969;height:50px;margin: 10px 0px 0px 0px;">
			<a href="<?php echo $link ?>" id ="alert"><img src="../images/plus.png" style = "height:50px;float:left;"> <h5 style = "float:left; margin: 16px 0px 0px 0px;padding-right:531px;color:#424242;">Создать предложение</h5> </a>
		</div>
		<div class = "widget" style = "margin-top:20px;">
			<div class="head"><h5 class="iList">Действующие предложения</h5></div>
			<script> 
				function sendpush(str)
				{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.onreadystatechange=function() {
					    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					      document.getElementById("walom").innerHTML=xmlhttp.responseText;
					    }
					}
					xmlhttp.open("POST","http://localhost/yourplace/admin/certificate/anderson",true);
					xmlhttp.send(str);
				}
			</script>
			<?php foreach(array_reverse($active) as $cert) {?>
			<div class="rowElem">
				<a href="view/id/<?php echo $cert->cert_id; ?>" style = "color:#424242;"> <?php echo $cert->name ?></a>
				<!-- <button type="button" class="btn btn-success" style = "float:right;"  onclick= "<?php echo "sendpush(".$cert->cert_id.")"?>">Success</button> -->

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
			<div class="head"><h5 class="iList">Недействующие предложения</h5></div>
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
 <?php if($link == '#') {?>
	<script src="../js/widget/alertify.min.js"></script>
	<script type="text/javascript">
	 	function reset () {
				$("#toggleCSS").attr("href", "../css/widget/alertify.default.css");
				alertify.set({
					labels : {
						ok     : "OK",
						cancel : "Cancel"
					},
					delay : 5000,
					buttonReverse : false,
					buttonFocus   : "ok"
				});
			}
			// Standard Dialogs
			$("#alert").on( 'click', function () {
				reset();
				alertify.alert("Вы исчерпали лимит предложений в недели.");
				return false;
			});
	</script>
<?php } ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.ToTop.js');
Yii::app()->clientScript->registerScript('search', "
$().UItoTop({ easingType: 'easeOutQuart' });    
");

?>?>