<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/13/2016
 * Time: 1:02 PM
 */

/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{
    $dbhost='localhost';// $dbhost='localhost';
    $dbname='id1012003_comment';//$dbname='comment';
    $dbuser='id1012003_rafy';
    $dbpass='rafy7239';
    $con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Failed to connect to MySQL: " . mysqli_error());
    //session_start(); //starting the session for user profile page
    if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query = mysqli_query($con,"SELECT us_name,us_pass FROM user where us_name = '$_POST[user]' AND us_pass = '$_POST[pass]'") or die(mysqli_error($query));
        $row = mysqli_fetch_array($query);
        if(!empty($row['us_name']) AND !empty($row['us_pass']))
        {
            $_SESSION['userName'] = $row['us_name'];
            $_SESSION['valid']="yes";
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['valid']="no";
            header('Location: SignIn.php');
        }
    }
    else
    {
        header('Location SignIn.php');
    }
}
if(isset($_POST['submit'])&&isset($_POST['user'])&&isset($_POST['pass']))
{
    SignIn();
}
?>