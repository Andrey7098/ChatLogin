<?php 
class Login{
    static public function checkLogin($Login){
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare(SQL_AVTORIZ_LOGIN);
        $stmt->bindParam(':login',$Login);
        $stmt->execute();
        if($stmt->fetchColumn())
            return true;
        return false;
    }
    static public function checkPassword($login,$password){
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare(SQL_AVTORIZ_PASSWORD);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":login",$login);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user)
            return $user['id_user'];
        return false;
    }
    static public function auth($id_user){
        $_SESSION['user'] = $id_user;
    }
    static public function logout(){
        unset($_SESSION['user']);
        header("Location:login");
    }
}
?>