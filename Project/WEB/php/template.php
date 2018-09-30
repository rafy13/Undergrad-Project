<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/13/2016
 * Time: 12:25 PM
 */
session_start();
if(!isset($_SESSION['userName']))
    header('Location: php/SignIn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algohunt</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="main">
    <div style="background: #293f59; width: 100%;height: 10%">
        <h1>
            <span style="color: red;margin: 0px;padding: 0px">A</span>
            <span style="color: white;padding: 0px">lgo</span>
            <span style="color: red">H</span>
            <span style="color: white">unt</span>
        </h1>
        <ul class="ulh">
            <li class="lih"><a href="../index.php">Home</a></li>
            <li class="lih"><a href="#new">News</a></li>
            <li class="lih"><a href="#contact">Contact</a></li>
            <li class="lih"><a href="#about">About</a></li>
            <li class="lih" style="float: right"><a href="Logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <h4 style="padding: 10px">Number Theory</h4>
        <ul>
            <li><a class="na" href="pages/Sieve.php">Sieve</a></li>
            <li><a href="#">Paris</a></li>
            <li><a href="#">Tokyo</a></li>
        </ul>
    </div>
    <div class="art">

    </div>
    <div class="fot">

    </div>
</div>
</body>
</html>