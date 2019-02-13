<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   hello
    <?php foreach($dialogue as $dialog):?>
       <br> <a href="<?php echo $dialog?>"><?php echo $dialog;?></a>
    <?php endforeach;?>
</body>
</html>