<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Start page</title>
</head>

<body>
<?php echo 'Connected as: '. $_SESSION['user'] .'<br />'; ?>
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