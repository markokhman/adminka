<?php
/* @var $this ClientController */
/* @var $model Client */
/*

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
")*/
?>
<?php
        Yii::app()->clientScript->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');       
        Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js');       

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/flot/jquery.flot.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/flot/jquery.flot.orderBars.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/flot/jquery.flot.pie.js');  
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/flot/excanvas.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/flot/jquery.flot.resize.js');

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/tables/jquery.dataTables.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/tables/colResizable.min.js');

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/forms.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.autosize.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/autotab.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.validationEngine-en.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.validationEngine.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.dualListBox.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.select2.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.maskedinput.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.inputlimiter.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.tagsinput.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/forms/jquery.wysiwyg.js');  

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/other/calendar.min.js');        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/other/elfinder.min.js');        

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/uploader/plupload.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/uploader/plupload.html5.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/uploader/plupload.html4.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/uploader/jquery.plupload.queue.js');
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.progress.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.jgrowl.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.tipsy.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.alerts.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.colorpicker.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.mousewheel.js');

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/wizards/jquery.form.wizard.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/wizards/jquery.validate.js');       

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.breadcrumbs.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.collapsible.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.ToTop.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.listnav.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.sourcerer.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.timeentry.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.prettyPhoto.js');

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/custom.js');

        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/charts/chart.js');
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/charts/auto.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/charts/bar.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/charts/hBar.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/charts/pie.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/charts/bar2.js');

        echo "<script> var arra1 = ".json_encode(array()).";var d1 = ".json_encode(array()).";var d2 = ".json_encode(array()).";var d3 = ".json_encode(array()).";</script>";
        ?>

	
<div class="wrapper">
	
	<!-- Left navigation -->
    <?php $this->widget('usermenu'); ?>

	<!-- Content -->
    <div class="content" id="container">
        <div class="title"><h5>Последние данные</h5></div>
        
        <!-- Statistics -->
        <div class="stats">
            <ul>
                <li><a href="#" class="count grey" title=""><?php echo Client::model()->count();?></a><span>клиента</span></li>                
                <li><a href="#" class="count grey" title=""><?php echo Certificate::model()->count();?></a><span>предложений</span></li>
                <li><a href="#" class="count grey" title=""><?php echo User::model()->count();?></a><span>пользователей</span></li>
                <li class="last"><a href="#" class="count grey" title=""><?php echo Order::model()->count('status=1');?></a><span>закрытых сертификатов</span></li>
            </ul>
        </div>
                        

        <div class="widget first">
            <div class="head"><h5 class="iUsers">Каталог клиентов</h5></div>
            <div id="myList-nav"></div>

            <ul id="myList">
	            <?php $list=Client::model()->findAll(array('order'=>'title'));
	            	foreach($list as $model){
	            		echo '<li>';
	            		echo CHtml::link($model->title, Yii::app()->createUrl('client/view', array('id'=>$model->cid)));	            		
	            		echo '<ul class="listData">';
	            		echo '<li><a href="#" title="">'.$model->email.'</a></li>';
	            		echo '<li><span class="red">'.$model->phone.'</span></li>';
	            		echo '<li><span class="cNote">'.$model->cat->category_name.'</span></li>';
	            		echo '</ul>
	                		</li>';
	                }
	            ?>            	
			</ul>
        </div>
        
    </div>
</div>


