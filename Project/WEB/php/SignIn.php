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
    <title>Login</title>
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
        <?php
        require_once ('SignIn_connect.php')
        ?>
        <form method="POST" action="" onsubmit="validation()" name="login" style="margin-top: 100px;margin-left: 30%">
            <br>User <br><input type="text" name="user" size="40"><br>
            <br>Password <br><input type="password" name="pass" size="40"><br>
            <br><input id="button" type="submit" name="submit" value="Log-In"><br>
            <?php
            if(array_key_exists('valid', $_SESSION))
            {
                if ($_SESSION['valid']==="no")
                    echo "<p style='color: red'>Wrong user name or password.Please retry.<p/>";
            }

            ?>
            <br><p>New user? Register <a href="registration.php">here</a></p><br>
        </form>
    </div>
    <div class="fot">

    </div>
</div>
</body>
</html>
<script>
    function validation() {
        var name=document.forms.login.user.value;
        var pass=document.forms.login.pass.value;
        if(name==""||pass=="") {
            alert("Please enter user name and password.");
            return false;
        }
    }
</script>