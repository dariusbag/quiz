<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz</title>
</head>

<body>

<?php
echo '<pre>';
var_dump($_SESSION['quizQuestions']);
echo '</pre>';

echo 'Connected as: '. $_SESSION['user'] .'<br />';
foreach($_POST as $key => $value){
    echo $key .' -:-'. $value .'<br />';
}


foreach($_POST as $key=>$value){
    if ($correctAnswers[$key] == $value){
        echo 'Correct <br />';
    }
}

?>

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