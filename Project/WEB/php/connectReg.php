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
function REG()
{
    $dbhost='localhost';// $dbhost='localhost';
    $dbname='id1012003_comment';//$dbname='comment';
    $dbuser='id1012003_rafy';
    $dbpass='rafy7239';//$dbpass='';
    $con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Failed to connect to MySQL: " . mysqli_error());
    if(!empty($_POST['user'])&&!empty($_POST['pass'])&&!empty($_POST['email'])&&!empty($_POST['inst']))
    {
        $query = mysqli_query($con,"INSERT INTO `user` (`us_id`, `us_name`, `us_pass`, `us_inst`, `us_email`) VALUES (NULL, '$_POST[user]', '$_POST[pass]', '$_POST[inst]', '$_POST[email]')") or die(mysqli_error($query));
        header('Location: ..\index.php');

    }
    else
    {
        unset($_POST);
        include ('registration.php');
    }
}
if(isset($_POST['submit']))
{
    REG();
    unset($_POST);
}
?>