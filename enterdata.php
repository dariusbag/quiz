<?php
session_start();

require_once 'classes/headers.php';
headers::redirect();

require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();

$newQuestion = '';
if(!empty($_POST['question'])){
    $newQuestion = ($_POST['question']);
    $dbManage->insertQuestion($newQuestion);
}

$questionsList = ($dbManage->retrieveAll_questions());
require_once 'view_enterdata.php';
?>