<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>
<body>
<?php
echo 'Connected as: '. $_SESSION['user'] .'<br />';
echo $questionID .' - '. $question .'<br />';
echo 'Upload picture related to question: <br />';
?>

<form enctype="multipart/form-data" action="" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
<?php
foreach($picturesArr as $picture){
    echo '<img src="'. $picture['address'] .'" alt="'. $picture['address'] .'" width="250" ><br />';
}

?>


<?php
echo 'Submited answer to question: '. $newAnswer .'<br />';
?>
<form method="POST" action="">
    <textarea rows="4" cols="64" name="answer" placeholder="Enter answer" ></textarea><br />
    <input type="submit" name="enter_answer" value="Submit answer" />
</form>

<form method="POST" action="">
<?php foreach($answersArr as $element){ ?>
  <input type="checkbox" name="<?php echo $element['id']; ?>" value="correct" <?php echo ($element['is_correct'] == 1) ? 'checked' : '' ; ?> >
  <?php echo $element['id'] .' - '. $element['answer'] .'<br />'; 
}?>
  <input type="submit" name="correct_answer" value="Mark correct answer">
</form>

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