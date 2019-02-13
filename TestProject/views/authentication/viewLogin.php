<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <style>
        <?php include "template/CSS/Authentication.css"; ?>
    </style>
</head>
<body>
   <div class="div_signup">
       <h1 style="margin-left:10px;">Авторизация</h1>
        <form action="" method="post">
            <input type="text" name="login" class="input_signup" placeholder="Введите логин"><br>
            <input type="password" name="password" class="input_signup" placeholder="Введите пароль"><br>
            <input type="submit" name="submit_login" class="button_signup">
        </form>
        <a href="signup" class="regis">Зарегестрироваться</a>
    </div>
</body>
</html>