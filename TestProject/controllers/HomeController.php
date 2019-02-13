<?php
include 'model/Signup.php';
include 'model/Login.php';
include 'model/Home.php';
include 'model/Chat.php';
class HomeController{
    public function actionStart(){
        include 'views/authentication/viewAuthentication.php';
        return true;
    }
    public function actionSignup(){
        $login = "";
        $email = "";
        $password1 = "";
        $password2 = "";
        $emailPov = false;
        $id_role = 0;
        $result = false;
        $regis = false;
//        echo SQL_REGIS_INSERT;
        if(isset($_POST['button_signup'])){
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $id_role = 11;
            $result = Signup::checkSignup($login,$email,$password1,$password2,Signup::checkEmail($email));
            if($result == false){
                $regis = Signup::signupRegis($login,$email,$password1,$id_role);
                if($regis == true){
                    echo 'Вы успешно зарегестрированны!';
                }else{
                    echo 'Призошла ошибка регистрцаии';
                }
            }else{
                echo array_shift($result);
            }
        
        
        }
        include 'views/authentication/viewSignup.php';
        return true;
    }
    public function actionLogin(){
        $login = '';
        $password = '';
        $loginCheck = false;
        if(isset($_POST['submit_login'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $loginCheck = Login::checkLogin($login);
            $CheckReturnId = Login::checkPassword($login,$password);
            if($loginCheck){
                 if($CheckReturnId){
                     Login::auth($CheckReturnId);
                     
                     header("Location:home");
                 }else{
                     echo"Пароль введен неверно!";
                 }
            }else{
                echo "Логин не существует!";
            }
            
        }
        include 'views/authentication/viewLogin.php';
        return true;
    }
    public function actionHome(){
        if(isset($_SESSION['user'])){
            $login = Home::login($_SESSION['user']);
        }
//        var_dump($login);
        include 'views/home/viewHome.php';
        return true;
    }
    public function actionAdmin(){
        //определяем данные пользователя по id из сессии
        if(isset($_SESSION['user'])){
            $login = Home::login($_SESSION['user']);
        }
        $CountUser = Chat::CountLogin($_SESSION['user']);
        include 'views/admin/viewAdminHome.php';
        return true;
    }
    public function actionDialogue($login){
        $dialogue = Chat::Dialogue($login);
//        var_dump($dialogue);
        include 'views/admin/viewAdminLogins.php';
//        echo $login;
        return true;
    }
    public function actionSmsLogin($login1,$login2){
//        echo $login1." ".$login2;
        $Sms_logins = Chat::SelectSMS($login1,$login2);
//        var_dump($Sms_logins);
        include 'views/admin/viewAdminSmsLogins.php';
        return true;
    }
    public function actionLogout(){
        Login::logout();
        return true;
    }
}