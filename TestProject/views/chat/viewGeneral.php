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
            <div class="login">Ваш логин <?php echo $login1['login'];?></div>
        
            <?php if($login1['id_role'] == 1):?>
                <a href="admin">Войти как администратор</a> 
            <?php endif;?>    
            <div class="exit"><a href="logout"><div >Выйти</div></a></div>
        </div>
        <div class="exit" style="top:70px;"><a href="home"><div>Home</div></a></div>
       <div class="XY_sms">
           <h1 style="margin-left:34%;">ОБЩИЙ ЧАТ!!!</h1>
               <div class="field_sms">
                     <!--           Ajax-запрос-->
               </div>            
            <form action="" method="post" class="XY_sms" style="margin-left:34%;">
                <input type="text" name="sms" class="input_sms" placeholder="Введите сообщение">
                <input type="submit" name="submit_sms" class="bottom">
            </form>
        </div>
        <script><?php include "template/JS/jquery-3.3.1.min.js";?></script>
        <script><?php include "template/JS/ajax_general.js"; ?></script>
<?php else:?>
    <a href="login">Пожалуйста авторизируйтесь</a>
<?php endif;?>
  
</body>
</html>