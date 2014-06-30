<?php
	$form=$this->beginWidget('CActiveForm', array(
	    'id'=>'certificate-form',
	    'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
	    
	)); 
     Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/widget/imgareaselect-default.css');
     Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/multistep/multistep.css');
 ?>

	<div id = "msform">
    
        <ul id="progressbar">
        <li class="active">Название</li>
        <li>Количество</li>
        <li>Время</li>
        <li>Детали</li>
        </ul>
            <fieldset>
                <h2 class="fs-title">Создать предложение</h2>
                <?php echo $form->errorSummary($model); ?>
                <div class="rowElem" style="display:none;">
                    <label>Клиент:</label>
                    <div class="formRight">
                        <?php echo $form->dropDownList($model, 'cid', CHtml::listData(Client::model()->findAll(), 'cid', 'title'), array('empty'=>'Выберите клиента...', 'style'=>'height:25px', 'class'=>'styled')); ?>
                        <?php echo $form->error($model,'cid'); ?>
                    </div>
                </div>

                <div class="rowElem">
                    <label>Название предложения:</label>
                    <div class="formRight">
                        <?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>
                </div>            

                <div class="rowElem">
                    <label>Описание:</label>
                    <div class="formRight">                    
                        <?php echo $form->textArea($model,'description',array('rows'=>3, 'cols'=>50)); ?>
                        <?php echo $form->error($model,'description'); ?>
                    </div>
                </div>

                <div class="rowElem">
                    <label>Условия:</label>
                    <div class="formRight">
                        <?php echo $form->textArea($model,'condition',array('rows'=>3, 'cols'=>80)); ?>
                        <?php echo $form->error($model,'condition'); ?>
                    </div>
                </div>

                <input type="button" name="next" class="next action-button" value="Дальше" />
            </fieldset>
            <fieldset  >
                
                <div class="rowElem" >
                    <?php echo $form->checkBox($model,'limitNumber'); ?>
                    <?php echo $form->label($model,'limitNumber'); ?>
                    <?php echo $form->error($model,'limitNumber'); ?>                                
                </div>

                <div id='numbers' >
                    <div class="rowElem">
                        <label>Количество:</label>
                        <div class="formRight">
                            <?php echo $form->numberField($model,'number', array('step'=>1, 'min'=>0, 'style'=>'height:25px')); ?>
                            <?php echo $form->error($model,'number'); ?>
                        </div>
                    </div>
                </div>
                
                <div class="rowElem" >
                    <label>Количество сертификатов для одного пользователя:</label>
                    <div class="formRight">
                        <?php echo $form->numberField($model,'numberPerAccount', array('step'=>1, 'min'=>1, 'style'=>'height:25px')); ?>
                        <?php echo $form->error($model,'numberPerAccount'); ?>
                    </div>
                </div>

                <input type="button" name="previous" class="previous action-button" value="Назад" />
                <input type="button" name="next" class="next action-button" value="Дальше" />
            </fieldset>
            <fieldset  >
            

                <div class="rowElem">
                    <label>Время начала:</label>
                    <div class="formRight">
                        <?php $this->widget(
                            'ext.jui.EJuiDateTimePicker',
                            array(
                                'model'     => $model,
                                'attribute' => 'time_begin',
                                'options'   => array(                            
                                ),
                            )
                        );?>
                        <?php echo $form->error($model,'time_begin'); ?>
                    </div>
                </div>

                <div class="rowElem">
                    <label>Время окончания:</label>
                    <div class="formRight">
                        <?php $this->widget(
                            'ext.jui.EJuiDateTimePicker',
                            array(
                                'model'     => $model,
                                'attribute' => 'time_end',
                                'options'   => array(                            
                                ),
                            )
                        );?>
                        <?php echo $form->error($model,'time_end'); ?>
                    </div>
                </div>

                <div class="rowElem">
                    <label>Время деактивации:</label>
                    <div class="formRight">
                        <?php $this->widget(
                            'ext.jui.EJuiDateTimePicker',
                            array(
                                'model'     => $model,
                                'attribute' => 'time_deactive',
                                'options'   => array(                            
                                ),
                            )
                        );?>
                        <?php echo $form->error($model,'time_deactive'); ?>
                    </div>
                </div>

                <input type="button" name="previous" class="previous action-button" value="Назад" />
                <input type="button" name="next" class="next action-button" value="Дальше" />            
            </fieldset >
            <fieldset  >
                
                <div class="rowElem" >
                    <label>Выберите группу:</label>
                    <div class="formRight">
                        <div class="stats">
                            <ul>
                                <li><a href="#" onclick="return false;" id="noobie" class="count grey" title="">Новичек</a></li>
                                <li><a href="#" onclick="return false;" id="medium" class="count grey" title="">Средний</a></li>
                                <li><a href="#" onclick="return false;" id="loyal" class="count grey" title="">Лояльный</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>

                <div class="rowElem" >
                    <label>Возраст: </label>
                    <div class="formRight">
                        <input type="text" id="amount-range" style="background-color: rgba(0, 0, 0, 0);border:0; color:rgb(58, 111, 165); font-weight:bold;" value="<?php echo $model->age_min.' - '.$model->age_max;?> "/>
                            <?php $form->widget('zii.widgets.jui.CJuiSliderInput',array(
                                'model'=>$model,
                                'attribute'=>'age_min',
                                'maxAttribute'=>'age_max',
                                'event'=>'change',
                                // additional javascript options for the slider plugin
                                'options'=>array(
                                    'range'=>true,
                                    'min'=>0,
                                    'max'=>100,
                                    'slide'=>'js:function(event,ui){$("#amount-range").val(ui.values[0]+\' - \'+ui.values[1]);}',                                
                                ),
                                'htmlOptions'=>array(),
                            ));?>                    
                    </div>
                </div>

                <div class="rowElem" >
                    <label>Пол :</label> 
                    <div class="formRight">
                    <?php echo $form->dropDownList($model, 'gender', array('0'=>'М/Ж', '1'=>'М', '2'=>'Ж'), array('style'=>'height:25px')); ?>                    
                    </div>
                </div>

                <div class="rowElem" >
                    <label>Сколько раз уже посещали c сертификатом: </label>
                    <div class="formRight">
                        <input type="text" id="amount-range2" style="background-color: rgba(0, 0, 0, 0);border:0; color:rgb(58, 111, 165); font-weight:bold;" value="<?php echo $model->attend_min.' - '.$model->attend_max;?> "/>
                            <?php $form->widget('zii.widgets.jui.CJuiSliderInput',array(
                                'model'=>$model,
                                'attribute'=>'attend_min',
                                'maxAttribute'=>'attend_max',
                                'event'=>'change',
                                // additional javascript options for the slider plugin
                                'options'=>array(
                                    'range'=>true,
                                    'min'=>0,
                                    'max'=>50,
                                    'slide'=>'js:function(event,ui){$("#amount-range2").val(ui.values[0]+\' - \'+ui.values[1]);}',                                
                                ),
                                'htmlOptions'=>array(),
                            ));?>
                    </div>
                    <h4 style="width: 43px; text-align: center; background-color: #FFFFFF;display: block; position: absolute;top: 124px; z-index: 100; left: 250px;">или</h4>
                </div>

                <div class="rowElem" >
                    <label>Количество отметок: </label>
                    <div class="formRight">
                        <input type="text" id="amount-range3" style="background-color: rgba(0, 0, 0, 0);border:0; color:rgb(58, 111, 165); font-weight:bold;" value="<?php echo $model->mark_min.' - '.$model->mark_max;?> "/>
                            <?php $form->widget('zii.widgets.jui.CJuiSliderInput',array(
                                'model'=>$model,
                                'attribute'=>'mark_min',
                                'maxAttribute'=>'mark_max',
                                'event'=>'change',
                                // additional javascript options for the slider plugin
                                'options'=>array(
                                    'range'=>true,
                                    'min'=>0,
                                    'max'=>50,
                                    'slide'=>'js:function(event,ui){$("#amount-range3").val(ui.values[0]+\' - \'+ui.values[1]);}',                                
                                ),
                                'htmlOptions'=>array(),
                            ));?>
                        <br>                                        
                        <?php echo $form->checkBox($model,'mark_here',array('checked'=>'checked')); ?>
                        <?php echo $form->label($model,'mark_here'); ?>                                
                        <?php echo $form->error($model,'mark_here'); ?>                                
            
                    </div>
                </div>

                <div class="rowElem" style="display:none;">
                    <label>Оценивали звездами: </label>
                    <div class="formRight">
                        <input type="text" id="amount-range4" style="background-color: rgba(0, 0, 0, 0);border:0; color:rgb(58, 111, 165); font-weight:bold;" value="0 - 5<?php //echo $model->star_min.' - '.$model->star_max;?> "/>
                            <!--<?php $form->widget('zii.widgets.jui.CJuiSliderInput',array(
                                'model'=>$model,
                                'attribute'=>'star_min',
                                'maxAttribute'=>'star_max',
                                'event'=>'change',
                                // additional javascript options for the slider plugin
                                'options'=>array(
                                    'range'=>true,
                                    'min'=>0,
                                    'max'=>5,
                                    'slide'=>'js:function(event,ui){$("#amount-range4").val(ui.values[0]+\' - \'+ui.values[1]);}',                                
                                ),
                                'htmlOptions'=>array(),
                            ));?>-->
                    </div>
                </div>

                <div class="rowElem" style="display:none;">
                    <label>Поделились в Facebook: </label>
                    <div class="formRight">
                        <input type="text" id="amount-range5" style="background-color: rgba(0, 0, 0, 0);border:0; color:rgb(58, 111, 165); font-weight:bold;" value="0 - 50<?php //echo $model->star_min.' - '.$model->star_max;?> "/>
                            <!--<?php $form->widget('zii.widgets.jui.CJuiSliderInput',array(
                                'model'=>$model,
                                'attribute'=>'fb_min',
                                'maxAttribute'=>'fb_max',
                                'event'=>'change',
                                // additional javascript options for the slider plugin
                                'options'=>array(
                                    'range'=>true,
                                    'min'=>0,
                                    'max'=>50,
                                    'slide'=>'js:function(event,ui){$("#amount-range5").val(ui.values[0]+\' - \'+ui.values[1]);}',                                
                                ),
                                'htmlOptions'=>array(),
                            ));?>-->
                    </div>
                </div>

                <div class="rowElem" style="display : none;">
                    <label>Тип уведомления:</label> 
                    <div class="formRight">
                    <?php echo $form->dropDownList($model, 'pushType', array('0'=>'Нет', '1'=>'Текст/Цифра', '2'=>'Текст', '3'=>'Цифра','4' =>'Чекин'), array('style'=>'height:25px')); ?>                    
                    </div>
                </div>

                <div class="rowElem" style = "display: none;">
                    <?php echo $form->textField($point,'longitude'); ?>
                </div>

                <div class="rowElem" style = "display: none;">
                    <?php echo $form->textField($point,'latitude'); ?>
                </div>

                <div class="rowElem" style = "display: none;">
                    <?php echo $form->textField($point,'home_number'); ?>
                </div>

                <div class="rowElem" style = "display: none;">
                    <?php echo $form->textField($point,'cid'); ?>
                </div>

                <div class="rowElem">
    				<p>Изображение</p>
    				<?php echo $form->fileField($image, 'extension',array("style"=>"border-radius:37px;"));?>
                    <?php echo $form->error($image,'extension'); ?>                                         
    			</div>
                <img id="blah" src="#" alt="your image" style = "position:relative;height:300px;display:none;float:left;" >                      
    			<span id="blea" style = "margin:107px 0px;position:relative;display:none;line-height:27px;"> <h6> Выделите <br>нужную<br> область <br> картинки</h6></span>
                
                <input type="button" name="previous" class="previous action-button" value="Назад" />
                <div class="submitForm "><?php echo CHtml::submitButton('Создать'); ?></div>
            </fieldset>
    </div>
    <?php $this->endWidget(); ?>
    
    <script type="text/javascript" src = "<?php echo Yii::app()->baseUrl ?>/js/multistep/multistep.js"></script>
    <script type="text/javascript" src = "<?php echo Yii::app()->baseUrl ?>/js/widget/jquery.min.js"></script> 
    <!--//<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>-->
    <script type="text/javascript" src = "<?php echo Yii::app()->baseUrl ?>/js/widget/jquery.imgareaselect.pack.js"></script> 
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
    <script type="text/javascript"> 

        function readURL(input) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                                $('#blah').attr('src', e.target.result);
                                $('#blah').css('display','block');
                                $('#blea').css('display','block');
                                };
              reader.readAsDataURL(input.files[0]);

            }
        }       

        $("#Images_extension").change(function(){
            readURL(this);
        });
        $(document).ready(function () {
            $('#blah').imgAreaSelect({  
                 x1: 20, y1: 10, x2: 50, y2: 40,
                  aspectRatio: '4:3',
                onSelectEnd: function (img, selection) {
                    $('#Place_latitude').val(selection.height);
                    $('#Place_longitude').val(selection.width);
                    $('#Place_home_number').val(selection.x1);
                    $('#Place_cid').val(selection.y1);
                }

            });
        });
    </script>
<script type="text/javascript">
 $(document).ready(function ($) {
        function moveDown ( id, min, max) {
            var step, cur_min, cur_max, parent_width, newmin, newmax, a,b; 

            item = $( id+" .ui-slider-handle"); 
            cur_min = item.eq(0).css("left");
            cur_max = item.eq(1).css("left");

            parent_width = item.parent().css('width');

            // a = min.replace('%', '');
            // b = max.replace('%', '');

            cur_min = cur_min.replace('px', '');
            cur_max = cur_max.replace('px', '');

            newmin = parent_width*min;
            newmax = parent_width*max;


            top += 20; // add 20 pixels to the current margin

            // content.style.marginTop = top + 'px'; // push div down

            // if (top < 200) {
                // If it's not yet 200 pixels then call this function
                // again in another 100 milliseconds (100 ms gives us
                // roughly 10 fps which should be good enough):
                // setTimeout(moveDown,100);
            // }
            alert (max);
        }
        
        // alert('Mark krasava!');
        var item; 
        var noobie_checkin_min, noobie_checkin_max, noobie_certificate_min, noobie_certificate_max, noobie_age_min, noobie_age_max;
        var medium_checkin_min, medium_checkin_max, medium_certificate_min, medium_certificate_max, medium_age_min, medium_age_max;
        var loyal_checkin_min, loyal_checkin_max, loyal_certificate_min, loyal_certificate_max, loyal_age_min, loyal_age_max;

        noobie_checkin_min = 0;
        noobie_checkin_max = 3;
        noobie_certificate_min = 0;
        noobie_certificate_max = 3;
        noobie_age_min = 0;
        noobie_age_max = 25;
        
        medium_checkin_min = 4;
        medium_checkin_max = 10;
        medium_certificate_min = 4;
        medium_certificate_max = 10;
        medium_age_min = 0;
        medium_age_max = 25;

        loyal_checkin_min = 11;
        loyal_checkin_max = 50;
        loyal_certificate_min = 11;
        loyal_certificate_max = 50;
        loyal_age_min = 15;
        loyal_age_max = 32;


        $('#noobie').click(function (e) {

            var cur_width, temp_min, temp_max;

            //Age, visible value '0-25'
            $('#amount-range').val(noobie_age_min+' - '+noobie_age_max);

            //Age, invisible values | they actually go to model()|
            $('#Certificate_age_min').val(noobie_age_min);
            $('#Certificate_age_min_end').val(noobie_age_max);
            
            //Setting the width. Age has max 100 => 100%
            item = $( "#Certificate_age_min_slider .ui-slider-handle"); 
            item.eq(0).css( "left", noobie_age_min+"%");
            item.eq(1).css( "left", noobie_age_max+"%");
            $( "#Certificate_age_min_slider .ui-widget-header").css('left', noobie_age_min+'%');
            $( "#Certificate_age_min_slider .ui-widget-header").css('width', noobie_age_max-noobie_age_min+'%');

            //Visit with certificate, visible value '0-25'
            $('#amount-range2').val(noobie_certificate_min+' - '+noobie_certificate_max);
            
            //Visit with certificate, invisible values | they actually go to model()|
            $('#Certificate_attend_min').val(noobie_certificate_min);
            $('#Certificate_attend_min_end').val(noobie_certificate_max);

            //Setting the slider width |maximum is 100 so we find the real|
            item = $( "#Certificate_attend_min_slider .ui-slider-handle"); 
            cur_width = item.parent().css('width');
            cur_width = cur_width.replace('px', '');

            temp_min = noobie_certificate_min/50*100;
            temp_max = noobie_certificate_max/50*100;

            item.eq(0).css( "left", temp_min+"%");
            item.eq(1).css( "left", temp_max+"%");
            $( "#Certificate_attend_min_slider .ui-widget-header").css('left', temp_min+'%');
            $( "#Certificate_attend_min_slider .ui-widget-header").css('width', temp_max-temp_min+'%');

            //CHeckins, visible value '0-25'
            $('#amount-range3').val(noobie_checkin_min+' - '+noobie_checkin_max);
            
            //CHeckins, invisible values | they actually go to model()|
            $('#Certificate_mark_min').val(noobie_checkin_min);
            $('#Certificate_mark_min_end').val(noobie_checkin_max);

            //Setting the slider width |maximum is 100 so we find the real|
            item = $( "#Certificate_mark_min_slider .ui-slider-handle"); 
            cur_width = item.parent().css('width');
            cur_width = cur_width.replace('px', '');

            temp_min = noobie_checkin_min/50*100;
            temp_max = noobie_checkin_max/50*100;

            item.eq(0).css( "left", temp_min+"%");
            item.eq(1).css( "left", temp_max+"%");
            $( "#Certificate_mark_min_slider .ui-widget-header").css('left', temp_min+'%');
            $( "#Certificate_mark_min_slider .ui-widget-header").css('width', temp_max-temp_min+'%');


            // moveDown('#Certificate_age_min_slider',noobie_age_min,noobie_age_max);


            // alert(item2);
        });

        $('#medium').click(function (e) {

            var cur_width, temp_min, temp_max;

            //Age, visible value '0-25'
            $('#amount-range').val(medium_age_min+' - '+medium_age_max);

            //Age, invisible values | they actually go to model()|
            $('#Certificate_age_min').val(medium_age_min);
            $('#Certificate_age_min_end').val(medium_age_max);
            
            //Setting the width. Age has max 100 => 100%
            item = $( "#Certificate_age_min_slider .ui-slider-handle"); 
            item.eq(0).css( "left", medium_age_min+"%");
            item.eq(1).css( "left", medium_age_max+"%");
            $( "#Certificate_age_min_slider .ui-widget-header").css('left', medium_age_min+'%');
            $( "#Certificate_age_min_slider .ui-widget-header").css('width', medium_age_max-medium_age_min+'%');

            //Visit with certificate, visible value '0-25'
            $('#amount-range2').val(medium_certificate_min+' - '+medium_certificate_max);
            
            //Visit with certificate, invisible values | they actually go to model()|
            $('#Certificate_attend_min').val(medium_certificate_min);
            $('#Certificate_attend_min_end').val(medium_certificate_max);

            //Setting the slider width |maximum is 100 so we find the real|
            item = $( "#Certificate_attend_min_slider .ui-slider-handle"); 
            cur_width = item.parent().css('width');
            cur_width = cur_width.replace('px', '');

            temp_min = medium_certificate_min/50*100;
            temp_max = medium_certificate_max/50*100;

            item.eq(0).css( "left", temp_min+"%");
            item.eq(1).css( "left", temp_max+"%");
            $( "#Certificate_attend_min_slider .ui-widget-header").css('left', temp_min+'%');
            $( "#Certificate_attend_min_slider .ui-widget-header").css('width', temp_max-temp_min+'%');

            //CHeckins, visible value '0-25'
            $('#amount-range3').val(medium_checkin_min+' - '+medium_checkin_max);
            
            //CHeckins, invisible values | they actually go to model()|
            $('#Certificate_mark_min').val(medium_checkin_min);
            $('#Certificate_mark_min_end').val(medium_checkin_max);

            //Setting the slider width |maximum is 100 so we find the real|
            item = $( "#Certificate_mark_min_slider .ui-slider-handle"); 
            cur_width = item.parent().css('width');
            cur_width = cur_width.replace('px', '');

            temp_min = medium_checkin_min/50*100;
            temp_max = medium_checkin_max/50*100;

            item.eq(0).css( "left", temp_min+"%");
            item.eq(1).css( "left", temp_max+"%");
            $( "#Certificate_mark_min_slider .ui-widget-header").css('left', temp_min+'%');
            $( "#Certificate_mark_min_slider .ui-widget-header").css('width', temp_max-temp_min+'%');


            // moveDown('#Certificate_age_min_slider',noobie_age_min,noobie_age_max);


            // alert(item2);
        });

        $('#loyal').click(function (e) {

            var cur_width, temp_min, temp_max;

            //Age, visible value '0-25'
            $('#amount-range').val(loyal_age_min+' - '+loyal_age_max);

            //Age, invisible values | they actually go to model()|
            $('#Certificate_age_min').val(loyal_age_min);
            $('#Certificate_age_min_end').val(loyal_age_max);
            
            //Setting the width. Age has max 100 => 100%
            item = $( "#Certificate_age_min_slider .ui-slider-handle"); 
            item.eq(0).css( "left", loyal_age_min+"%");
            item.eq(1).css( "left", loyal_age_max+"%");
            $( "#Certificate_age_min_slider .ui-widget-header").css('left', loyal_age_min+'%');
            $( "#Certificate_age_min_slider .ui-widget-header").css('width', loyal_age_max-loyal_age_min+'%');

            //Visit with certificate, visible value '0-25'
            $('#amount-range2').val(loyal_certificate_min+' - '+loyal_certificate_max);
            
            //Visit with certificate, invisible values | they actually go to model()|
            $('#Certificate_attend_min').val(loyal_certificate_min);
            $('#Certificate_attend_min_end').val(loyal_certificate_max);

            //Setting the slider width |maximum is 100 so we find the real|
            item = $( "#Certificate_attend_min_slider .ui-slider-handle"); 
            cur_width = item.parent().css('width');
            cur_width = cur_width.replace('px', '');

            temp_min = loyal_certificate_min/50*100;
            temp_max = loyal_certificate_max/50*100;

            item.eq(0).css( "left", temp_min+"%");
            item.eq(1).css( "left", temp_max+"%");
            $( "#Certificate_attend_min_slider .ui-widget-header").css('left', temp_min+'%');
            $( "#Certificate_attend_min_slider .ui-widget-header").css('width', temp_max-temp_min+'%');

            //CHeckins, visible value '0-25'
            $('#amount-range3').val(loyal_checkin_min+' - '+loyal_checkin_max);
            
            //CHeckins, invisible values | they actually go to model()|
            $('#Certificate_mark_min').val(loyal_checkin_min);
            $('#Certificate_mark_min_end').val(loyal_checkin_max);

            //Setting the slider width |maximum is 100 so we find the real|
            item = $( "#Certificate_mark_min_slider .ui-slider-handle"); 
            cur_width = item.parent().css('width');
            cur_width = cur_width.replace('px', '');

            temp_min = loyal_checkin_min/50*100;
            temp_max = loyal_checkin_max/50*100;

            item.eq(0).css( "left", temp_min+"%");
            item.eq(1).css( "left", temp_max+"%");
            $( "#Certificate_mark_min_slider .ui-widget-header").css('left', temp_min+'%');
            $( "#Certificate_mark_min_slider .ui-widget-header").css('width', temp_max-temp_min+'%');


            // moveDown('#Certificate_age_min_slider',noobie_age_min,noobie_age_max);


            // alert(item2);
        });
    });   
</script>
    