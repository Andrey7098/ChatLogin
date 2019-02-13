<?php 
//include 'template/SQL/SQL.php'; 
    class Chat{
        static public function WriteSMS($login,$sms,$data){
            $pdo = Db::getConnection();
            $stmt = $pdo->prepare(SQL_WRITE_SMS);
            $stmt->bindParam(':login',$login);
            $stmt->bindParam(':sms',$sms);
            $stmt->bindParam(':data',$data);
            $result = $stmt->execute();
            return $result;
        }
        static public function OutputSMS(){
            $pdo = Db::getConnection();
            $stmt = $pdo->query(SQL_OUTPUT_SMS);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        static public function CountLogin($id){
            $pdo = Db::getConnection();
            $stmt = $pdo->prepare(SQL_COUNT_LOGIN);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        static public function ChatLogin($loginUser,$loginInterlocutor,$sms,$data){
            $pdo = Db::getConnection();
            $stmt = $pdo->prepare(SQL_SMS_LOGIN);
            $stmt->bindParam(":login_sender",$loginUser);
            $stmt->bindParam(":login_recipient",$loginInterlocutor);
            $stmt->bindParam(":sms",$sms);
            $stmt->bindParam(":data_sender",$data);
            return $stmt->execute();
        }
        static public function SelectSMS($loginUser,$loginInterlocutor){
            $pdo = Db::getConnection();
            $stmt = $pdo->prepare(SQL_SMS_LOGIN_SELECT);
            $stmt->bindParam("login_sender",$loginUser);
            $stmt->bindParam("login_recipient",$loginUser);
            $stmt->bindParam("login_sender1",$loginInterlocutor);
            $stmt->bindParam("login_recipient1",$loginInterlocutor);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        static public function Dialogue($login){
            $pdo = Db::getConnection();
            
            $stmt = $pdo->prepare(SQL_DIALOGUE_USER_RECIPIENT);
            $stmt->bindParam(':login_sender',$login);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_NUM);
            
            $stmt1 = $pdo->prepare(SQL_DIALOGUE_USER_SENDER);
            $stmt1->bindParam(':login_recipient',$login);
            $stmt1->execute();
            $result1 = $stmt1->fetchAll(PDO::FETCH_NUM);
            $arr = array();
            //Объеденяем массивы
            $DialogueArray = array_merge($result,$result1);
            foreach($DialogueArray as $a => $b){
                foreach($b as $f => $g){
                    $arr[] = $g;
                }
            }
           
//            $DialogueArray = (array) $DialogueArray;
            //удаляем повторяющие значения из массива
            $DialogueArrayUnique = array_unique($arr);
            return  $DialogueArrayUnique;
//            return $arr;
//            return  $result;
        }
    }
?>