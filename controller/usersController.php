<?php

require_once '../model/users.php';
require_once '../database/DB.php';
include_once('../app/classes/session.php');
include_once('../app/classes/Redirect.php');

class UsersController {

  

    public function auth(){
     
        if(isset($_POST['submit'])){
           
            $data['Email'] = $_POST['Email'];
            $result = user::login($data);
            $hashed_password = $result->Password;
        //    $hash_pass = $_POST['Password'];
       
            // $hashed_password = $result->Password;
            if( $result->Email === $_POST['Email'] &&  password_verify($_POST['Password'], $hashed_password)){   
                //  password_verify($result->password, $hashed_password)
                $_SESSION['logged'] = true;
                $_SESSION['UserName'] = $result->UserName;
                $_SESSION['UserId'] = $result->UserId;
         
                Redirect::to('profil.php');
            } else {
                session::set('error','email or password not valid');
                Redirect::to('login.php');
            }
        }
    }
    public function register(){
        if(isset($_POST['submit'])){
            $Password = $_POST['Password'];
            $hashed_password = password_hash($Password, PASSWORD_BCRYPT);
      
            //   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
           
            $data = array(
                'UserName' => $_POST['UserName'],
                'Email' => $_POST['Email'],
                // 'Password' => $_POST['Password'],
                'Password' => $hashed_password,
                
            );
            $result = User::createUser($data);
            if($result === 'ok'){
                session::set('success','compte crée');
                Redirect::to('login.php');
            }else{
                echo $result;
            }
        }
    }
    static public function logout(){
        session_destroy();
    }
}