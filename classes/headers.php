<?php
class headers{
    public static function redirect(){
            if(!isset($_SESSION['user'])){
            header('Location: index.php');
        }
    }
}

?>