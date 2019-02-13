<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        <?php include'template/CSS/SMS.css'?>
    </style>
    <style>
        <?php include "template/CSS/Home.css"; ?>
    </style>
</head>
<body>
   <?php if(isset($_SESSION['user'])):?>
        <div class="header">
        <div class="login">Ваш логин <?php echo $login['login'];?></div>
        <a href="/TestProject/index.php/logout" class="exit">Выйти</a>
        </div>
        <a href="/TestProject/index.php/home" class="exit" style="top:70px;">Home</a>
        <div class="XY_sms">
           <h1 style="margin-left:34%;">Чат с <div id="login_interlocutor"><?php echo $loginInterlocutor;?></div></h1>
            <div class="field_sms sms">
<!--               Ajax-запрос-->
                
            </div>
            <form style="margin-left:34%;" action="" method="post" class="XY_sms">
                <input type="text" name="sms" class="input_sms" placeholder="Введите сообщение">
                <input type="submit" name="submit_sms" class="bottom">
                
            </form>
        </div>
    <script src="../../template/JS/jquery-3.3.1.min.js"></script>
    <script src="../../template/JS/ajax.js"></script>
    <?php else:?>
        <a href="login">Пожалуйста авторизируйтесь</a>
    <?php endif;?>
    
</body>
</html>