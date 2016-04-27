<?php
// http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/
class DB_management{
    private $host      = 'localhost';
    private $dbname    = 'kilimuva_itabc';
    private $charset    = 'utf8';
    private $user      = 'kilimuva_itabc';
    private $pass      = 'IsspaudymasUnifikacija';
 
    private $dbConn;
    private $error;
 
    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname .';charset='. $this->charset;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbConn = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    // retrieve row by email from table users as associative array
	public function retrieveRow_users($email){
    $stmt = $this->dbConn->prepare("SELECT * FROM darius_user WHERE email = :email" );
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
	}
    
    // retrieve question by id from table questions as associative array
	public function retrieveQuestion_questions($id){
    $stmt = $this->dbConn->prepare("SELECT question FROM darius_questions WHERE id = :id" );
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
	}
    
    // retrieve answers list by question id from table answers as associative array
	public function retrieveAnswers_answers($questionID){
    $stmt = $this->dbConn->prepare("SELECT * FROM darius_answers WHERE question_id = :id" );
    $stmt->bindValue(':id', $questionID);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
	}
    
    // retrieve pictures list by question id from table darius_img as associative array
	public function retrievePictures($questionID){
    $stmt = $this->dbConn->prepare("SELECT * FROM darius_img WHERE question_id = :id" );
    $stmt->bindValue(':id', $questionID);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
	}

    
    // retrieve all undeleted from table questions as associative array
	public function retrieveAll_questions(){
    $stmt = $this->dbConn->prepare("SELECT id, question FROM darius_questions WHERE is_deleted = 0" );
    // $stmt->bindValue(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
	}

	public function insertUser($email, $passw){
    $stmt = $this->dbConn->prepare("INSERT INTO darius_user (email, passw) VALUES (:email, :passw)");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':passw', $passw);
    $stmt->execute();
	}
	
	public function insertQuestion($question){
    $stmt = $this->dbConn->prepare("INSERT INTO darius_questions (question) VALUES (:question)");
    $stmt->bindValue(':question', $question);
    $stmt->execute();
	}
	
	public function insertPicture($questionID, $imgAddress){
    $stmt = $this->dbConn->prepare("INSERT INTO darius_img (question_id, address) VALUES (:questionID, :address)");
    $stmt->bindValue(':questionID', $questionID);
    $stmt->bindValue(':address', $imgAddress);
    $stmt->execute();
	}
    	
	public function insertAnswer($questionID, $answer){
    $stmt = $this->dbConn->prepare("INSERT INTO darius_answers (question_id, answer) VALUES (:questionID, :answer)");
    $stmt->bindValue(':questionID', $questionID);
    $stmt->bindValue(':answer', $answer);
    $stmt->execute();
	}
    
    
	// mark answer as correct
	public function answerCorrect($isCorrect, $answerID){
    $stmt = $this->dbConn->prepare("UPDATE darius_answers SET is_correct = $isCorrect WHERE id = $answerID");
    // $stmt->bindValue(':questionID', $questionID);
    // $stmt->bindValue(':answer', $answer);
    $stmt->execute();
	}


// unfinished
// if value exists, returns it in associative array
	public function retrieveElement($table, $column, $field){
    $stmt = $this->dbConn->prepare("SELECT * FROM $table WHERE $column = :field" );
    $stmt->bindValue(':field', $field);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
	}
}
?>
