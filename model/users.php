<?php
require_once('../database/DB.php');
require_once '../app/classes/session.php';
require_once '../app/classes/Redirect.php';
class User{

    
    public static function login($data){
        $Email = $data['Email'];
        try{
            $query = 'SELECT * FROM users WHERE Email=:Email';  
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":Email"=>$Email));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            if($stmt->execute()){
                return 'ok';
            } 
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
      }
    
    static public function createUser($data){
        try{
        $stmt = DB::connect()->prepare('INSERT INTO users (UserName,Email,Password) VALUES (:UserName,:Email,:Password)');
        $stmt->bindParam(':UserName',$data['UserName']);
        $stmt->bindParam(':Email',$data['Email']);
        $stmt->bindParam(':Password',$data['Password']);
        if($stmt->execute()){
            return 'ok';
        }
        }catch(PDOException $ex){
            echo 'error' . $ex->getMessage();
        }

        $stmt = null;
    }
}

?>