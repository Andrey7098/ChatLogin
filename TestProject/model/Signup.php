<?php 
include 'template\SQL\SQL.php';
    class Signup{
        public static function checkSignup($login,$email,$password1,$password2,$emailPov){
            $errors = array();
            if($login == ""){
                $errors[] = "Введите логин";
            }
            if($email == ""){
                $errors[] = "Введите email";
            }
            if($password1 == ""){
                $errors[] = "Введите пароль";
            }
            if($password1 != $password2){
                $errors[] = "Повторный пароль введен неверно";
            }
            if($emailPov == true){
                $errors[] = "Емаил существует";
            }
            return $errors;
        }
        public static function signupRegis($login,$email,$password1,$id_role){
            $pdo = Db::getConnection();
            $stmt = $pdo->prepare(SQL_REGIS_INSERT);
            $stmt->bindParam(':login',$login);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password1);
            $stmt->bindParam(':id_role',$id_role);
            return $stmt->execute();
        }
        public static function checkEmail($email){
            $pdo = Db::getConnection();
            $stmt = $pdo->prepare(SQL_REGIS_EMAIL);
            $stmt->bindParam(':email',$email);
            $stmt->execute();
            if($stmt->fetchColumn())
                return true;
            return false;
        }
    }
?>