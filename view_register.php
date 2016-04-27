<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
</head>
<body>
<?php echo 'Connected as: '. $_SESSION['user'] .'<br />'; ?>
<form method="POST" action="">
    <input type="text" name="email" placeholder="Enter email" />
    <input type="password" name="pass" placeholder="Enter password" />
    <input type="submit" name="register" value="Submitas" />
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
</body>
</html>