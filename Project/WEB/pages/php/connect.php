<?php
	date_default_timezone_set('America/New_York');
	$dbhost='localhost';// $dbhost='localhost';
	$dbname='id1012003_comment';//$dbname='comment';
	$dbuser='id1012003_rafy';
	$dbpass='rafy7239';//$dbpass='';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error($connect));
?>