<?php
session_start();

require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();

if((empty($_POST['email'])) || (empty($_POST['pass']))){
        echo 'Enter data <br />';
    }else{
	$email = trim($_POST['email']);
	$passw = md5(trim($_POST['pass']));
    
    // checking if email is in database, if not, inserting data
    if($email == $dbManage->retrieveRow_users($email)['email']){
        echo 'Email allready exists';
        }else{
            $dbManage->insertUser($email, $passw);
        }
}

require_once 'view_register.php';
?>