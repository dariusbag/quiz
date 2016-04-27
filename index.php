<?php
session_start();
require_once 'classes/DB_management_class.php';
$dbManage = new DB_management();



require_once 'view_index.php';
?>