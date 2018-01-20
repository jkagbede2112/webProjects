<?php

session_start();
$urlaccess = $_SESSION['urlaccess'];
$categoryname = $_SESSION['categoryname'];
$name = $_SESSION['name'];
$staffid = $_SESSION['staffid'];
session_destroy();
header("Location:navigator.php");