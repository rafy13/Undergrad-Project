<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/13/2016
 * Time: 12:25 PM
 */

session_start();
if(!isset($_SESSION['userName']))
    header('Location: ../php/SignIn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algohunt</title>
    <meta charset="UTF-8" lang="en-US">
    <link rel="../css/stylesheet" href="Style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="js/global.js"></script>
    <link rel="stylesheet" href="../css/Style.css">
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
            <li class="lih"><a href="../contact.php">Contact</a></li>
            <li class="lih"><a href="../about.php">About</a></li>
            <li class="lih" style="float: right"><a href="../php/Logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <h4 style="padding: 10px">Number Theory</h4>
        <ul>
            <li><a class="na" href="Sieve.php">Sieve</a></li>
            <li><a href="#">Paris</a></li>
            <li><a href="#">Tokyo</a></li>
        </ul>
    </div>
    <div class="art" style="width: 77%;margin-left: 3%;">
        <P>Ihis is a tutorial on seive of perehenthesis.</P>
        <p>we all know about prime number.</p>
        <p>If we want to generate a list of prime numbers between range [0..N], there is a better
            algorithm than testing each number in the range whether it is a prime number or not. The</p>
        <br><br><hr>
        <?php require_once 'php/connect.php'; require_once 'php/functions.php'; ?>
        <div >
            <?php
            get_total();
            require_once 'php/check_com.php';
            ?>
            <div>
                <form action="" method="post" >
                    <label>enter a brief comment</label>
                    <textarea class="form-text" name="comment" id="comment"></textarea>
                    <br />
                    <input type="submit" class="form-submit" name="new_comment" value="post">
                </form>
            </div>
            <?php get_comments(); ?>
        </div>
    </div>

    <div class="fot">
        <p align="center">Developed and Maintained by</p>
        <p align="center">A. K. M. RABBY</p>
    </div>
</div>
</body>
</html>





<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/13/2016
 * Time: 12:25 PM
 */
session_start();
if(!isset($_SESSION['userName']))
    //$_SESSION['valid']=true;
    header('Location: php/SignIn.php');
?>
