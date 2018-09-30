<?php
	function get_total() {
        require 'connect.php';
        $page=$_SERVER['SCRIPT_NAME'];
        $is_any = false;
        $is_any=(bool)($result = mysqli_query($connect, "SELECT * FROM `parents` WHERE page='$page' ORDER BY `date` "));
        $row_cnt = 0;
        if($is_any)
            $row_cnt = mysqli_num_rows($result);
        echo '<br><br>'.'<h3 style="color: green">All Comments ('.$row_cnt.')</h3>';
	}

	function get_comments() {
        require 'connect.php';
        $page=$_SERVER['SCRIPT_NAME'];
        $is_any=(bool)($result = mysqli_query($connect, "SELECT * FROM `parents` WHERE page='$page' ORDER BY `date` "));
        if($is_any){
            foreach($result as $item) {
                $date = new dateTime($item['date']);
                $date = date_format($date, 'M j, Y | H:i:s');
                $user = $item['user'];
                $comment = $item['text'];
                $par_id = $item['id'];
                $chi_result = mysqli_query($connect, "SELECT * FROM `children` WHERE `par_id`='$par_id' ORDER BY `date` DESC");
                $chi_cnt = mysqli_num_rows($chi_result);
                echo '<div class="comment" id="'.$par_id.'">'
                    .'<p class="user">'.$user.'</p>&nbsp;'
                    .'<p class="time">'.$date.'</p>'
                    .'<p class="comment-text">'.$comment.'</p>'
                    .'<a class="link-reply" id="reply" name="'.$par_id.'">Reply</a>';
                if($chi_cnt!=0){
                    echo '<a class="link-reply" id="children" name="'.$par_id.'"><span >replies('.$chi_cnt.')</span> </a>';
                }

                echo '<div class="child" id="P-'.$par_id.'" style="display:none">'//When click the replies , the input area with P-par_id will toggle
                    .'<form action="" method="post">
                        <textarea class="form-text" name="reply" id="new-reply"></textarea>'.'<br />'
                        .'<input type="hidden" name="par_id" value="'.$par_id.'" />'
                        .'<input type="submit" id="form-reply" name="new_reply" value="Reply" />'
                    .'</form>'
                    .'</div>';
                if($chi_cnt == 0){
                } else {
                    echo '<div class="child-comments" id="C-'.$par_id.'">';//When click the replay , all child with c-par_id will toggle

                    foreach($chi_result as $com) {
                        $chi_date = new dateTime($com['date']);
                        $chi_date = date_format($chi_date, 'M j, Y | H:i:s');
                        $chi_user = $com['user'];
                        $chi_com = $com['text'];
                        $chi_par = $com['par_id'];

                        echo '<div class="child" >'//id="'.$par_id.'-C"
                            .'<p class="user">'.$chi_user.'</p>&nbsp;'
                            .'<p class="time">'.$chi_date.'</p>'
                            .'<p class="comment-text">'.$chi_com.'</p>'
                            .'</div>';
                    }
                    echo '</div>';
                }
                echo '</div>';
            }
        }

	}

?>