<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 1/28/2017
 * Time: 3:48 AM
 */
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algohunt</title>
    <link rel="stylesheet" href="css/Style.css">
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
            <h1 align="center" style="color: green">Contact</h1>
            <div>

            </div>

            <pre>

                        If you have any question or recommendation for this site feel free to contact.

                                                <b>A.K.M.Rabby</b>

                                                Student,

                                                Department of Computer Science and Engineering, RUET.

                                                Phone: +880 1780529045

                                                Email: rafy020395@gmain.com
            </pre>


        </div>

    </div>
    <div class="fot">
        <p align="center">Developed and Maintained by</p>
        <p align="center">A. K. M. RABBY</p>
    </div>
</div>
</body>
</html>