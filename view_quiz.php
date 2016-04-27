<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz</title>
</head>

<body>

<?php 
// echo 'Connected as: '. $_SESSION['user'] .'<br />';
// foreach($_POST as $key => $value){
    // echo $key .' -:-'. $value .'<br />';
// }
?>
<form method="POST" name="result" action="result.php">
<?php
$_SESSION['quizQuestions'] = [];
$quizAnswers = [];
// looping through list of questions
for($i = 0; $i < 10; $i++){
    echo $questionsArray[$i]['id'] .' --- '. $questionsArray[$i]['question'] .'<br />';
    // looping through list of pictures
    foreach($dbManage->retrievePictures($questionsArray[$i]['id']) as $picture){ ?>
        <img src="<?php echo $picture['address']; ?>" alt="<?php echo $picture['address']; ?>" width="250" ><br />
    <?php }
    // looping through list of answers
    foreach($dbManage->retrieveAnswers_answers($questionsArray[$i]['id']) as $answer){ ?>
        ------<input type="checkbox" name="<?php echo $answer['id']; ?>" value="<?php echo $questionsArray[$i]['id']; ?>">------- <?php echo $questionsArray[$i]['id'] .' - '. $answer['id'] .' - '. $answer['answer'];
            $quizAnswers[] = $answer['id'] .' - '. $answer['answer'];
        ?><br />
    <?php }
    $_SESSION['quizQuestions'][$questionsArray[$i]['id']] = [$questionsArray[$i]['question'], $quizAnswers];
    $quizAnswers = array();
echo '<br/>';
}

// looping through list of questions and answers
// foreach($questionsArray as $element){
    // echo $element['id'] .' - '. $element['question'] .'<br />';
    // foreach($dbManage->retrieveAnswers_answers($element['id']) as $answer){
        // echo '------<input type="checkbox" name='. $answer['id'] .'>------- '. $answer['answer'] .'<br />';
    // }
// echo '<br />';
// }
?>
<input type="submit" name="submit_answers" value="Guess">
</form >
<ul>
    <li><a href="index.php">Index</a></li>
    <li><a href="quiz.php">Quiz</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="enterdata.php">Enter data</a></li>
    <li><a href="question.php">Question</a></li>
    <li><a href="logout.php?logout">Sign Out</a></li>
</ul>
</body>

</html>