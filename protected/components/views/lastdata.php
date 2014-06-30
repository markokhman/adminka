<div class="title"><h5>Последние данные</h5></div>
        <div class="stats">
            <ul>
                <?php if (Yii::app()->user->name != 'admin'){?>
                <li><a href="#" class="count grey" title=""><?php echo $user->markNumber();?></a><span>отметки</span></li>
                <li><a href="#" class="count grey" title=""><?php echo $user->closedCertificateNumber();?></a><span>закрыто сертификатов</span></li>
                <?php }?>
            </ul>
        </div>