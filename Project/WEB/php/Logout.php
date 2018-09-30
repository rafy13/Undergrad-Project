<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/13/2016
 * Time: 3:23 PM
 */
session_start();
unset($_SESSION['userName']);
header('Location: ..\index.php');
?>