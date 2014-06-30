<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'certificate-form',
    'enableAjaxValidation'=>false,
)); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ui/jquery.ToTop.js');
Yii::app()->clientScript->registerScript('search', "
$().UItoTop({ easingType: 'easeOutQuart' });    
");
Yii::app()->clientScript->registerScript('number', "
    $('#number').click(function() {  
    if($(this).is(':checked')) // this refers to the element that fired the event
    {        
        $('#numbers').show();   
    }
    else{        
        $('#numbers').hide();          
    }
});
");
?>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

<!-- Peetrns choose script -->
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


<div class="wrapper">
    <div class="leftNav">
        <ul id="menu">
        <?php if (Yii::app()->user->name == 'admin'){?>
            <li class="dash"><?php echo CHtml::link('<span>Главная</span>', Yii::app()->createUrl('client/main'));?></li>
            <li class="typo"><?php $arr=array(); if($model->isNewRecord) $arr=array('class'=>'active'); echo CHtml::link('<span>Создать предложение</span>', Yii::app()->createUrl('certificate/create'), $arr);?></li>            
            <li class="login"><?php echo CHtml::link('<span>Создать клиента</span>', Yii::app()->createUrl('client/create'));?></li>
            <li class="graphs"><?php echo CHtml::link('<span>Статистика</span>', Yii::app()->createUrl('client/statistics'));?></li>
            <li class="contacts"><?php echo CHtml::link('<span>Каталог клиентов</span>', Yii::app()->createUrl('client/admin')); }?></li>   
        <?php if (Yii::app()->user->name != 'admin'){?>
            <li class="graphs"><?php echo CHtml::link('<span>Главная</span>', Yii::app()->createUrl('client/mainClient', array('id'=>Yii::app()->user->id))); }?></li>   
            <li class="typo"><?php $arr=array(); if($model->isNewRecord && $offer_type == 'usual') $arr=array('class'=>'active'); echo CHtml::link('<span>Создать предложение</span>', Yii::app()->createUrl('certificate/create', array('id'=>Yii::app()->user->id,'offer_type' =>'usual')), $arr);?></li>
            <li class="typo"><?php $arr=array(); if($model->isNewRecord && $offer_type == 'checkin') $arr=array('class'=>'active'); echo CHtml::link('<span>Создать чекин предложение</span>', Yii::app()->createUrl('certificate/create', array('id'=>Yii::app()->user->id,'offer_type' =>'checkin')), $arr);?></li>
            <li class="typo"><?php echo CHtml::link('<span>Создать target предложение</span>', Yii::app()->createUrl('certificate/history'));?></li>            
            <li class="dash"><?php echo CHtml::link('<span>О нас</span>', Yii::app()->createUrl('client/view', array('id'=>Yii::app()->user->id)));?></li>
        </ul>
    </div>

    <div class="content" id="container">
        <?php 
            $this->widget('lastdata');        
        ?>
<fieldset>
    <div class="widget first">
        <?php if($offer_type == "checkin") $rstring = " чекин";
        else $rstring = "" ?>
        <div class="head"><?php if($model->isNewRecord) echo '<h5 class="iCreate">Создать'.$rstring.' предложение</h5>'; else echo '<h5 class="iList">Изменить предложение</h5>'; ?></div>
            
            <div class="rowElem" <?php if (Yii::app()->user->name != 'admin'){  echo "style = \"display:none;\"" ; }?>>
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
                    <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>80)); ?>
                    <?php echo $form->error($model,'description'); ?>
                </div>
            </div>

            <div class="rowElem">
                <label>Условия:</label>
                <div class="formRight">
                    <?php echo $form->textArea($model,'condition',array('rows'=>6, 'cols'=>80)); ?>
                    <?php echo $form->error($model,'condition'); ?>
                </div>
            </div>

            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
                <!--<div><input  id="number" type="checkbox" name="group1" value="Milk"> Ограничить количество сертификатов</div>-->
                <?php echo $form->checkBox($model,'limitNumber'); ?>
                    <?php echo $form->label($model,'limitNumber'); ?>
                    <?php echo $form->error($model,'limitNumber'); ?>                                
            </div>
            <div id='numbers' <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
                <div class="rowElem">
                    <label>Количество:</label>
                    <div class="formRight">
                        <?php echo $form->numberField($model,'number', array('step'=>1, 'min'=>0, 'style'=>'height:25px')); ?>
                        <?php echo $form->error($model,'number'); ?>
                    </div>
                </div>
            </div>
            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
                <label>Количество сертификатов для одного пользователя:</label>
                <div class="formRight">
                    <?php echo $form->numberField($model,'numberPerAccount', array('step'=>1, 'min'=>1, 'style'=>'height:25px')); ?>
                    <?php echo $form->error($model,'numberPerAccount'); ?>
                </div>
            </div>

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

            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
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

            <!--<div class="fluid">
                <div class="span5" style="margin-left: 50px;">
                    
                    <div class="widget">
                        <div class="head">
                            <h5 class="iPin">Места</h5>
                            <input type="button" style="float : right; margin : 5px;" value="+1" class="blueBtn">
                        </div>
                        <div class="body">
                            <div class="left"></div>
                            <div class="list arrowBlue">
                                <span class="legend">б-р. Бухар жырау, 66 (бывш. Ботанический бульвар), уг. ул. Ауэзова </span>
                                <ul>
                                    <li><a href="#">см. на карте</a></li>
                                </ul>
                            </div>
                            
                            <div class="list arrowRed pt12">
                                <span class="legend">мкр-н. Орбита-3, дом 3 (ул. Мустафина, уг.ул. Фрунзе) </span>
                                <ul>
                                     <li><a href="#">см. на карте</a></li>
                                </ul>
                            </div>
                            
                            <div class="list arrowGrey pt12">
                                <span class="legend">ул. Кабанбай батыра, 83, (бывш. ул. Калинина), уг. ул. Фурманова</span>
                                <ul>
                                     <li><a href="#">см. на карте</a></li>
                                </ul>
                            </div>

                            <div class="list arrowGreen pt12">
                                <span class="legend">ул. Толе би, 74, уг. ул. Желтоксан (бвш. ул. Мира)</span>
                                <ul>
                                     <li><a href="#">см. на карте</a></li>
                                </ul>
                            </div>

                            <div class="rowElem">
                                <label>Место:</label>
                                <br>
                                
                                    <select data-placeholder="Выберите место чтобы добвить его..." class="select" tabindex="2">
                                        <option value=""></option> 
                                        <option value="Cambodia">Cambodia</option> 
                                        <option value="Cameroon">Cameroon</option> 
                                        <option value="Canada">Canada</option> 
                                        <option value="Cape Verde">Cape Verde</option> 
                                    </select>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span5">
                 
                    <div class="widget">
                        <div class="head"><h5 class="">На карте:</h5></div>
                        <div class="body">
                            
                            <div id="map" style="width: 330px; height: 276px"></div>
                            
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
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

            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
                <label>Пол :</label> 
                <div class="formRight">
                <?php echo $form->dropDownList($model, 'gender', array('0'=>'М/Ж', '1'=>'М', '2'=>'Ж'), array('style'=>'height:25px')); ?>                    
                </div>
            </div>

            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
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
                <h4 style="width: 43px; text-align: center; background-color: #FFFFFF;display: block; position: absolute;top: 85px; z-index: 100; left: 350px;">или</h4>

            </div>

            <div class="rowElem" <?php if ($offer_type=='checkin') echo "style='display:none;'";?>>
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

            <div class="submitForm"><?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'greyishBtn')); ?></div>


    </div>
</fieldset>

        
    

<?php $this->endWidget(); ?>

</div><!-- form -->