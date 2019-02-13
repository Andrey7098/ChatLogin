<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php foreach($Sms_logins as $sms):?>
        Отправил <?php echo $sms['login_sender']." ".$sms['sms'];?><br>
    <?php endforeach;?>
</body>
</html>