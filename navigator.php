<?php
session_start();
if (isset($_SESSION['urlaccess'])){
    $urlaccess = $_SESSION['urlaccess'];
    header("location: $urlaccess");
}else{
    header("location:index.php");
}


