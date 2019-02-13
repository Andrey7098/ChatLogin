<?php
class Home{
    static public function login($id){
        $id = (int)$id;
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare(SQL_LOGIN_ID);
        $stmt->bindParam(":id_user",$id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user)
            return $user;
        return false;
    }
}
?>
    