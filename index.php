<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['urlaccess'])) {
    $urlaccess = $_SESSION['urlaccess'];
    //header("location: $urlaccess");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/jquery-1.11.3.js" type="text/javascript"></script>
        <link href="css/terveCure.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/tervescript.js" type="text/javascript"></script>
        <link href="css/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <style>
            body{
                padding:20px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div style="text-align:right">
            <span onclick='loadhomeUrl()' style='cursor:pointer'><img src="images/tervecure.png" width="70px"></span>
        </div>
        <span class="loginpane">

            <form>
                <span class="medicalguys">
                    <img src="images/nursesD.png">
                </span>
                <span class="coylogo">
                    <img src="images/purplesourcelogo.png" width="200px">
                </span>
                <label>Username</label>
                <input type="text" class="form-control" id="username">
                <label>Password</label>
                <input type="password" class="form-control" id="password">
                <div style="text-align:center; font-family:raleway; margin-top:5px; color:#ccc">
                    <span>Forgotten Password</span> - 
                    <span>Register Account</span>
                </div>
                <div style="margin-top:20px">
                    <input type="button" class="btn login" value="Login" onclick="login(username.value, password.value)">
                    <input type="reset"  class="btn reset" value="Reset">
                </div>
            </form>
        </span>
        <script>
            function login(a, b) {
                $.post("partials/login.php", {username: a, password: b}).done(function (data) {
                    if (data === "0") {
                        alert("Invalid login details");
                    } else {
                        window.location = "navigator.php";
                    }
                });
            }
        </script>
        <div class="emrinfo">
            <span onclick='loadhomeUrl()' style='cursor:pointer'>TerveCure HMS10062017v1</span>
        </div>
    </body>
</html>
