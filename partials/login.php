<?php

include "connect.php";

$username = purifyentry("username");
$password = purifyentry("password");

$t = mysqli_query($w, "select * from staff where username ='$username'");
$d = mysqli_fetch_array($t);
$name = strtoupper($d['lastname']) . " " . $d['firstname'];
$staffid = $d['staffid'];
$role = $d['role'];
$storedpassword = $d['password'];

if (md5($password) === md5($storedpassword)) {
    //Get role url from staff category
    $o = mysqli_query($w, "select urlaccess, categoryname from staff_category where staff_categoryid ='$role'");
    $fd = mysqli_fetch_array($o);
    $urlaccess = $fd['urlaccess'];
    $categoryname = $fd['categoryname'];

    session_start();
    $_SESSION['urlaccess'] = $urlaccess;
    $_SESSION['categoryname'] = $categoryname;
    $_SESSION['name'] = $name;
    $_SESSION['staffid'] = $staffid;
    echo "$urlaccess $categoryname $name $staffid";
} else {
    echo "0";
}