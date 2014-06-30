<?php
	$form=$this->beginWidget('CActiveForm', array(
	    'id'=>'certificate-form',
	    'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
	    
	)); 
     Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/widget/imgareaselect-default.css');
     Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/multistep/multistep3.css');
 ?>

	<div id = "msform">
    
        <ul id="progressbar">
        <li class="active">Название</li>
        <li>Время</li>
        <li>Детали</li>
        
        </ul>
            <fieldset>
                <h2 class="fs-title">Создать чекин предложение</h2>
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
                
                <div class="rowElem" style = "display:none;">
                    <?php echo $form->checkBox($model,'limitNumber'); ?>
                    <?php echo $form->label($model,'limitNumber'); ?>
                    <?php echo $form->error($model,'limitNumber'); ?>                                
                </div>

                <div id='numbers' >
                    <div class="rowElem" style = "display:none;">
                        <label>Количество:</label>
                        <div class="formRight">
                            <?php echo $form->numberField($model,'number', array('step'=>1, 'min'=>0, 'style'=>'height:25px')); ?>
                            <?php echo $form->error($model,'number'); ?>
                        </div>
                    </div>
                </div>
                
                <div class="rowElem" style = "display:none;" >
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

                <input type="button" name="previous" class="previous action-button" value="Назад" />
                <input type="button" name="next" class="next action-button" value="Дальше" />
            </fieldset>
            </fieldset >
            <fieldset >

                <div class="rowElem" style = "display:none;" >
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

                <div class="rowElem" style = "display:none;" >
                    <label>Пол :</label> 
                    <div class="formRight">
                    <?php echo $form->dropDownList($model, 'gender', array('0'=>'М/Ж', '1'=>'М', '2'=>'Ж'), array('style'=>'height:25px')); ?>                    
                    </div>
                </div>

                <div class="rowElem" style = "display:none;" >
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
                        <div style = "display:none;"><?php echo $form->checkBox($model,'mark_here',array('checked'=>'checked')); ?>
                        <?php echo $form->label($model,'mark_here'); ?>                                
                        <?php echo $form->error($model,'mark_here'); ?>                                
                        </div>
            
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
    			<span id="blea" style = "margin:107px 0px;position:relative;display:none;line-height:27px;"> <h6> Выделите <br>нужную <br>область <br>картинки</h6></span>
                
                <input type="button" name="previous" class="previous action-button" value="Назад" />
                <div class="submitForm "><?php echo CHtml::submitButton('Создать'); ?></div>
            </fieldset>
    </div>
    <?php $this->endWidget(); ?>
    
    <script type="text/javascript" src = "../js/multistep/multistep.js"></script>
    <script type="text/javascript" src = "../js/widget/jquery.min.js"></script>
    <script type="text/javascript" src = "../js/widget/jquery.imgareaselect.pack.js"></script>
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
    <script type="text/javascript" src = "../js/widget/validate.min.js"></script>
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
        var validator = new FormValidator('example_form', [{
            name: 'req',
            display: 'required',    
            rules: 'required'
        }, {
            name: 'alphanumeric',
            rules: 'alpha_numeric'
        }, {
            name: 'password',
            rules: 'required'
        }, {
            name: 'password_confirm',
            display: 'password confirmation',
            rules: 'required|matches[password]'
        }, {
            name: 'email',
            rules: 'valid_email',
            depends: function() {
                return Math.random() > .5;
            }
        }, {
            name: 'minlength',
            display: 'min length',
            rules: 'min_length[8]'
        }], function(errors, event) {
            if (errors.length > 0) {
                // Show the errors
            }
        });
    </script>