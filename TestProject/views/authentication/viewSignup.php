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
        <form action="" method="post">
            <input type="text" class="input_signup" name="login" placeholder="login"><br>
            <input type="email" class="input_signup" name="email" placeholder="email"><br>
            <input type="password1" class="input_signup" name="password1" placeholder="password"><br>
            <input type="password2" class="input_signup" name="password2" placeholder="povtor password"><br>
            <input type="submit" value="Отправить" class="button_signup" name="button_signup">
        </form>
        <a href="login" class="avtoriz">Авторизироваться</a>
    </div>
</body>
</html>