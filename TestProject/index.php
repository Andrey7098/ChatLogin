<?php
    
    //Режим ошибок
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    //Подключаем роутер для работы с URL
    define('ROOT',dirname(__FILE__));
    require_once(ROOT.'/components/Router.php');

    session_start();

    //Подключаемся к БД
    require_once(ROOT.'/components/DB.php');

    //Обращаемся к роуту
    $router = new Router();
    $router->run();
    
    
?>