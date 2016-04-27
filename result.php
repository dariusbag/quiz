<?php
session_start();
require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$correctAnswers = rightAnswers();



function rightAnswers(){
    return array(51=>"13", 43=>"6", 44=>"6", 57=>"22");
}

require_once 'view_result.php';
?>