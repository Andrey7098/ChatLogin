
<?php foreach($Sms_output as $sms1): ?>
    <?php if($sms1['login'] == $login1['login']):?>
        <div class="SMS_HW_Login">
        Отправил<?php echo " ".$sms1['login'];?>
        <div class="sms_text">
        <?php echo $sms1['sms'];?>
        </div>
        </div>
    <?php else:?>
        <div class="SMS_HW">
        Отправил<?php echo " ".$sms1['login'];?>
        <div class="sms_text">
        <?php echo $sms1['sms'];?>
        </div>
        </div>
    <?php endif;?>
<?php endforeach;?>