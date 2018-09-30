<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/14/2016
 * Time: 12:19 AM
 */
session_start();
if(isset($_SESSION['userName']))
    header('Location: ../index.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
            <li class="lih"><a href="#contact">Contact</a></li>
            <li class="lih"><a href="#about">About</a></li>
            <li class="lih" style="float: right"><a href="SignIn.php">LOGIN</a></li>
            <li class="lih" style="float: right"><a href="registration.php">REGISTER</a></li>
        </ul>
    </div>
    <div class="nav">

    </div>
    <div class="art" style="width: 80%">
        <form method="POST" action="connectReg.php" style="margin-top: 100px;margin-left: 30%">
            <?php
            $sc='/new/php/connectReg.php';
            if ($_SERVER['SCRIPT_NAME']===$sc)
                echo "<h5 align='center' style='color: red'>Please Enter all The Required Field.<p/>";
            ?>
            <h2> Please Fill Up the following information:</h2>
            <table cellspacing="25px" cellpadding="5%" style="float: centre">
                <tr>
                    <td  align="right" class="style1">User Name:</td>
                    <td class="style1"><input type="text" name="user" /></td>
                </tr>
                <tr>
                    <td align="right">Institution:</td>
                    <td><input type="text" name="inst" /></td>
                </tr>

                <tr>
                    <td align="right">Email:</td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td align="right">Password:</td>
                    <td><input type="text" name="pass" /></td>
                </tr>
                <tr>
                    <td align="right"> <input type="submit" value="SUBMIT" name="submit" align="right"/></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="fot">

    </div>
</div>