<?php
function redirect(){
        if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }
}

?>