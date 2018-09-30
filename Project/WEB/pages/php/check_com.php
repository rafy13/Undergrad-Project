<?php

    // new reply
    if(isset($_POST['new_reply']) && $_POST['reply']) {
        $new_reply_name = $_SESSION['userName'];
        $new_reply_text = $_POST['reply'];
        date_default_timezone_set('Asia/Dhaka');
        $new_reply_date = date('Y-m-d H:i:s');
        $new_reply_id = $_POST['par_id'];
        mysqli_query($connect, "INSERT INTO `children` (`user`, `text`, `date`, `par_id`) VALUES ('$new_reply_name', '$new_reply_text', '$new_reply_date', '$new_reply_id')") or die(mysqli_error());
        //header("Location: ");
    }
	// new comment
	if(isset($_POST['new_comment'])&&$_POST['comment']) {
		$new_com_name = $_SESSION['userName'];
		$new_com_text = $_POST['comment'];
        date_default_timezone_set('Asia/Dhaka');
		$new_com_date = date('Y-m-d H:i:s');
        $page=$_SERVER['SCRIPT_NAME'];
        if(isset($new_com_text)) {
            mysqli_query($connect, "INSERT INTO `parents` (`user`, `text`, `date`, `page`) VALUES ('$new_com_name', '$new_com_text', '$new_com_date', '$page')");
        }
		//header("Location: ");
	}
	get_total();
?>