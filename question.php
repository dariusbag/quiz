<?php
session_start();

require_once 'classes/headers.php';
headers::redirect();

require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();

// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';

// question id by GET method
$questionID = '';
if(!empty($_GET['id'])){
    $questionID = $_GET['id'];
}
// retrieving question from DB by ID
$question = ($dbManage->retrieveQuestion_questions($questionID)['question']);
// retrieving the whole list of questions not deleted
$questionsList = ($dbManage->retrieveAll_questions());

// setting directory for files upload
$uploadDir = 'img/';
if(!empty($_FILES['userfile'])){
    // getting file name
    $fileName = (basename($_FILES['userfile']['name']));
    $uploadFile = $uploadDir . $fileName;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile);
    $dbManage->insertPicture($questionID, $uploadFile);
}

// retrieving pictures list by question ID
$picturesArr = $dbManage->retrievePictures($questionID);

// writing answer to database if texarea is filled
$newAnswer = '';
if(!empty($_POST['answer'])){
    $newAnswer = ($_POST['answer']);
    $dbManage->insertAnswer($questionID, $newAnswer);
}

// retrieving answers list by question ID
$answersArr = $dbManage->retrieveAnswers_answers($questionID);

// marking the correct answers
if(isset($_POST['correct_answer'])){
    foreach($answersArr as $answer){
        $answerID = $answer['id'];
        $dbManage->answerCorrect(((isset($_POST[$answerID])) ? 1 : 0), $answerID);
    }
}
// retrieving answers list by question ID
$answersArr = $dbManage->retrieveAnswers_answers($questionID);


require_once 'view_question.php';
?>
