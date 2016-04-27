<?php
session_start();
require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();
$questionsArray = $dbManage->retrieveAll_questions();

shuffle($questionsArray);

// retrieving pictures list by question ID
// $picturesArr = $dbManage->retrievePictures($questionID);

require_once 'view_quiz.php';
?>