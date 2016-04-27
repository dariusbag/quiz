<?php
session_start();
require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();

if((empty($_POST['email'])) || (empty($_POST['pass']))){
        echo 'Enter data <br />';
    }else{
    $email = trim($_POST['email']);
	$passw = md5(trim($_POST['pass']));
// var_dump($email, $passw);

    if(($dbManage->retrieveRow_users($email)['email']) && ($passw == ($dbManage->retrieveRow_users($email)['passw']))){
            echo 'Match <br />';
            $_SESSION['user'] = $dbManage->retrieveRow_users($email)['email'];
        }else{
            echo 'Do not match';
        }
    }
    
require_once 'view_login.php';
?>