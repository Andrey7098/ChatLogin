<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        <?php include "template/CSS/Admin.css";?>
    </style>
</head>
<body>
    <?php if(isset($_SESSION['user'])):?>
        
        Ваш логин <?php echo $login['login'];?>
        <a href="logout">Выйти</a>
        <a href="general">Общий чат</a>
        <div class="Users">
            <?php foreach($CountUser as $user):?>
                <br><a href="admin/<?php echo $user['login'];?>/"><?php echo $user['login'];?></a>
            <?php endforeach;?>
        </div>
    <?php else:?>
        <a href="login">Пожалуйста авторизируйтесь</a>
    <?php endif;?>
</body>
</html>