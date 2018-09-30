<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/14/2016
 * Time: 12:19 AM
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header style="height: 60px">
    <h2 align="left">AlgoHunt</h2>
</header>
<div class="flex-container" style="height: 800px">


    <nav class="nav">

    </nav>

    <article class="article"">
    <form method="POST" action="SignIn_connect.php">
        User <br><input type="text" name="user" size="40"><br>
        Password <br><input type="password" name="pass" size="40"><br>
        <input id="button" type="submit" name="submit" value="Log-In">
    </form>
    <p>New user? Register <a href="registration.php">here</a></p>
    <?php
    $sc='/new/php/SignIn_connect.php';
    if ($_SERVER['SCRIPT_NAME']===$sc)
        echo "<p style='color: red'>Wrong user name or password.Please retry.<p/>";
    ?>
    </article>
    <footer style="height: 50px">
        Copyright @AlgoHunt
        <br>Contact : rafy.ruet13@gmail.com
    </footer>
</div>
</body>
</html>
