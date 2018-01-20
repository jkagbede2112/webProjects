<?php

session_start();
$rQurl = "http://localhost" . $_SERVER['REQUEST_URI'];
$rQurl2 = "localhost" . $_SERVER['REQUEST_URI'];
$servurl = $_SESSION['urlaccess'];

if ($rQurl === $servurl || $rQurl === $servurl) {
} else {
    header("location:navigator.php");
}