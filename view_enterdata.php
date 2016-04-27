<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Data entry</title>
</head>
<?php echo 'Connected as: '. $_SESSION['user'] .'<br />'; ?>
<form method="POST" action="">
    <textarea rows="6" cols="64" name="question" placeholder="Enter question" ></textarea><br />
    <input type="submit" name="enter_question" value="Submit question" />
</form>
<body>
<ul>
    <li><a href="index.php">Index</a></li>
    <li><a href="quiz.php">Quiz</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="enterdata.php">Enter data</a></li>
    <li><a href="question.php">Question</a></li>
    <li><a href="logout.php?logout">Sign Out</a></li>
</ul>

<?php 
    // looping through list of questions
    foreach($questionsList as $element){
        echo '<a href="question.php?id='. $element['id'] .'">'. $element['id'] .' - '. $element['question'] .'</a>';
    echo '<br />';
} ?>

</body>

</html>