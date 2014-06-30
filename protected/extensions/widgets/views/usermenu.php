<div class="leftNav">
        <ul id="menu">
        <?php if (Yii::app()->user->name != 'admin'){?>
            <li class="graphs"><?php echo CHtml::link('<span>Главная</span>', Yii::app()->createUrl('client/mainClient', array('id'=>Yii::app()->user->id)));?></li>   
            <li class="typo"><?php echo CHtml::link('<span>Создать предложение</span>', Yii::app()->createUrl('certificate/usualcert'));?></li>
            <li class="typo"><?php echo CHtml::link('<span>Создать чекин предложение</span>', Yii::app()->createUrl('certificate/checkincert'));?></li>
            <li class="typo"><?php echo CHtml::link('<span>Создать target предложение</span>', Yii::app()->createUrl('certificate/history'));?></li>            
            <li class="dash"><?php echo CHtml::link('<span>О нас</span>', Yii::app()->createUrl('client/view', array('id'=>Yii::app()->user->id)));?></li>
            <?php } ?>
        <?php if (Yii::app()->user->name == 'admin') {?>
        	<li class="dash"><?php echo CHtml::link("<span>Главная</span>", Yii::app()->createUrl('client/main'));?></li>
            <li class="login"><?php echo CHtml::link('<span>Создать клиента</span>', Yii::app()->createUrl('client/create'));?></li>
            <li class="graphs"><?php echo CHtml::link('<span>Статистика</span>', Yii::app()->createUrl('client/statistics'));?></li>
            <li class="contacts"><?php echo CHtml::link('<span>Каталог клиентов</span>', Yii::app()->createUrl('client/admin')); }?></li>   
        </ul>
    </div>