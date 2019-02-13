<?php 
include 'model/Signup.php';
include 'model/Login.php';
include 'model/Home.php';
include 'model/Chat.php';
//include 'template/AJAX/SmsChat.php';
class ChatController{
    public function actionGeneral(){
            if(isset($_SESSION['user'])){
                $login1 = Home::login($_SESSION['user']);
            }
//            $Sms_output = Chat::OutputSMS();  
            $sms = "";    
            $login = "";
            $write = false;
            if(isset($_POST['submit_sms'])){
                $sms = $_POST['sms'];
                $data = date('H-i-s');
                $login = $login1['login'];
                $write = Chat::WriteSMS($login,$sms,$data);
                $_POST = array();
                if($write){
                    echo "Данные успешно добавлены";
                    header('Location:general');
                }else{
                    echo "Произошла ошибка";
                }
            }
        include'views/chat/viewGeneral.php';
        return true;
    }
    public function actionAjaxGeneral(){
        if(isset($_SESSION['user'])){
            $login1 = Home::login($_SESSION['user']);
        }  
        $Sms_output = Chat::OutputSMS();
        include 'template/AJAX/AjaxGeneral.php';
        return true;
    }
    public function actionChat(){
        if(isset($_SESSION['user'])){
            $login = Home::login($_SESSION['user']);
        }
        $CountLogin = Chat::CountLogin($_SESSION['user']);
        include 'views/chat/viewChat.php';
        return true;
    }
    
    public function actionLogin($loginInterlocutor){
        $loginInterlocutor;
        $login = Home::login($_SESSION['user']);
        $loginUser = $login['login'];
        $SMS_output = Chat::SelectSMS($loginUser,$loginInterlocutor);
        $data = date("s-i-H");
        $sms = '';
        $result = false;
        if(isset($_POST['submit_sms'])){
            $sms = $_POST['sms'];
            $result = Chat::ChatLogin($loginUser,$loginInterlocutor,$sms,$data);
            if($result){
            header("Location:/TestProject/index.php/chat/$loginInterlocutor");
            }else{
                echo 'Произошла ошибка ввода';
            }
        }
//        echo "<br>"."Тут ваши диалог с ".$loginInterlocutor;
        include"views/chat/viewChatLogin.php";
        return true;
    }
    
    public function actionAjaxChatLogin($loginInterlocutor){
//        echo "hello";
        $login = Home::login($_SESSION['user']);
        $loginUser = $login['login'];
//        echo $loginUser;
//        echo $loginInterlocutor;
        $Sms_output = Chat::SelectSMS($loginUser,$loginInterlocutor);
        include "template/AJAX/AjaxSmsLoginChat.php";
        return true;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>