<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 1/28/2017
 * Time: 3:19 AM
 */
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algohunt</title>
    <link rel="Stylesheet" href="css/Style.css">
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
            <li class="lih"><a href="index.php">Home</a></li>
            <li class="lih"><a href="contact.php">Contact</a></li>
            <li class="lih"><a href="about.php">About</a></li>
            <?php
            if(!isset($_SESSION['userName']))
                echo ' 
                    <li class="lih" style="float: right"><a href="php/SignIn.php">LOGIN</a></li>
                    <li class="lih" style="float: right"><a href="php/registration.php">REGISTER</a></li>';
            else
                echo '
            <li class="lih" style="float: right"><a href="php/Logout.php">Logout</a></li>';
            ?>
        </ul>
    </div>
    <div class="nav">

    </div>
    <div class="art" style="width: 77%;margin-left: 3%;">
        <div style="margin-top: 100px">
            <h1 align="center" style="color: green">About Us:</h1>
            <p class="child">Many students want to start competitive programming. But they become confused how to start.
                This website offers tutorials about important algorithms in competitive programming and
                computer science. In this site we try to discuss the algorithm very easily so that a beginner
                can easily understand it also gives them a guideline so that they can reach to an average
                level in the field of competitive programming.</p>

        </div>

    </div>
    <div class="fot">
        <p align="center">Developed and Maintained by</p>
        <p align="center">A. K. M. RABBY</p>
    </div>
</div>
</body>
</html>