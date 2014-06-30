<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/widget/alertify.core.css" />
<link rel="stylesheet" href="../css/widget/alertify.default.css" id="toggleCSS" />
<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.ToTop.js');
Yii::app()->clientScript->registerScript('search', "
$().UItoTop({ easingType: 'easeOutQuart' });    
");

?>

<div class="wrapper">
    <?php 
   		$this->widget('usermenu');
 	?>
    <div class="content" id="container">
    	
        <!-- Statistics -->
        <?php 
        	$this->widget('lastdata');
         ?>
        <div class="stats">
            <ul>
                
                <?php 
                	$certs = Certificate::model()->findAllByAttributes(array('cid'=>Yii::app()->user->id));
                	$orders = 0; 
                ?>
            </ul>
        </div>
<div id="slides">
        <div id="preoffers">
            <fieldset id="offers" style="float:left;">
            <?php for ($i = count($certs)-1; $i >= 0 ; $i--)
            {
            ?>
            <div class="offer" style="width:100%;">
            <div class="widget" style="width:50%; display: initial; float:left;">
                <div class="head" style="height:150px;">
                    <h5 style="border-bottom: 1px solid rgb(252, 127, 127);"><?php echo $certs[$i]->name; ?></h5>
                    <h5><?php echo $certs[$i]->description; ?></h5>
                    <h5 style="font-style: bold;">
                    <?php 

                        $closed_number = Order::model()->countByAttributes(array('cert_id' => $certs[$i]->cert_id,'status' => 1));
                        $cert_info = CertificateInfo::model()->findByAttributes(array('cert_id' =>$certs[$i]->cert_id));
                        
                        if($cert_info == null)
                            $viewed_number = 0;
                        else $viewed_number = $cert_info->visited_number;

                        $procent = 0;
                        if($viewed_number != 0)
                        {
                            $procent = $closed_number*100/$viewed_number;
                        } 
                        else $procent = $closed_number*100;
                        if ($procent > 100) $procent = 100;
                        $procent = round($procent);
                         $date_begin = Yii::app()->dateFormatter->format('dd.MM.yy', $certs[$i]->time_begin);
                         $date_end = Yii::app()->dateFormatter->format('dd.MM.yy', $certs[$i]->time_end);
                         echo $date_begin." - ".$date_end;                     
                     ?></h5>
                </div>
            </div>

            <h5 style="display:block; font-size: 60px; font-family: 'Open Sans', sans-serif; padding-top: 70px; margin-left: 410px;"><?php echo $procent; ?>%</h5>

            <h5 style="margin-left: 442px;font-size: 25px;width: 55px;text-align: center;color: green;padding-top: 20px;border-bottom: 1px solid green;font-family: 'Open Sans', sans-serif;"> <?php echo $closed_number; ?></h5>
            <h5 style="margin-left: 442px; font-size: 25px;width: 55px;text-align: center;color: rgb(207, 53, 53); padding-top: 8px; font-family: 'Open Sans', sans-serif;"    ><?php echo $viewed_number; ?></h5>

            <a href="<?php if($isallowed) echo Yii::app()->createUrl('certificate/createcert', array('number' => $certs[$i]->cert_id)); ?>" id="" class="alert" >
                <div class="go" style="width: 120px;float: right;margin-top: -123px;border: 1px solid rgb(172,172,172);border-radius: 10px;margin-right:0px;">
                    <h5 style="float: right;width: 100px;text-align: center;font-size: 20px;padding-right: 10px;padding-top: 13px;">Укрепить отношения</h5>
                    <img style="margin-left: 45px; margin-top: -9px; margin-bottom: 8px;" src="<?php echo Yii::app()->baseUrl.'/images/love.png' ?>" width="30px">
                </div>
            </a>
            </div>
            <?php 
            }
            ?>
            

            </fieldset>
        </div>
        
</div>
</div><!-- form -->
<?php if(!$isallowed){ ?>
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
			$(".alert").on( 'click', function () {
				reset();
				alertify.alert("Вы исчерпали лимит предложений в недели.");
				return false;
			});
	</script>
	<?php } ?>