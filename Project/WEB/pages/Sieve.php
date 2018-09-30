<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 */
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algohunt</title>
    <meta charset="UTF-8" lang="en-US">
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
            <?php
            if(!isset($_SESSION['userName']))
                echo ' 
                    <li class="lih" style="float: right"><a href="../php/SignIn.php">LOGIN</a></li>
                    <li class="lih" style="float: right"><a href="../php/registration.php">REGISTER</a></li>';
            else
                echo '<li class="lih" style="float: right"><a href="../php/Logout.php">Logout</a></li>';
            ?>
        </ul>
    </div>
    <div class="nav">
        <?php
        include 'nav_bar.php';
        ?>
    </div>
    <div class="art" style="width: 77%;margin-left: 3%;">

        <!-- First part of the article goes here -->
        <h1 style="color: green">Sieve of Eratosthenes:</h1>
        <p class="child">Given a number n, print all primes smaller than or equal to n. It is also given that n is a small number.<br>
            For example, if n is 10, the output should be “2, 3, 5, 7”.  If n is 20, the output should be “2, 3, 5, 7, 11, 13, 17, 19”</p>
        <p class="child">The sieve of Eratosthenes is one of the most efficient ways to find all primes smaller than n when n is smaller than 10 million or so.<br>
        </p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <div>
            <p class="child">Following is the algorithm to find all the prime numbers less than or equal to a given integer&nbsp;<em>n</em>&nbsp;by Eratosthenes’ method:</p>
            <ol type="1">
                <li class="child">Create a list of consecutive integers from 2 to&nbsp;<em>n</em>: (2, 3, 4, …,&nbsp;<em>n</em>).</li>
                <li class="child">Initially, let&nbsp;<em>p</em>&nbsp;equal 2, the first prime number.</li>
                <li class="child">Starting from&nbsp;<em>p</em>, count up in increments of&nbsp;<em>p</em>&nbsp;and mark each of these numbers greater than&nbsp;<em>p</em>&nbsp;itself in the list. These numbers will be 2<em>p</em>, 3<em>p</em>, 4<em>p</em>, etc.; note that some of them may have already been marked.</li>
                <li class="child">Find the first number greater than&nbsp;<em>p</em>&nbsp;in the list that is not marked. If there was no such number, stop. Otherwise, let&nbsp;<em>p</em>&nbsp;now equal this number (which is the next prime), and repeat from step 3.</li>
            </ol>
            <p class="child">When the algorithm terminates, all the numbers in the list that are not marked are prime.
            </p>
        </div>
        <p class="child"><strong>Explanation with Example:</strong><br>
            Let us take an example when n = 50.  So we need to print all print numbers smaller than or equal to 50. </p>
        <p class="child">We create a list of all numbers from 2 to 50.<br><br>
            <img src="../image/sieve/Sieve1-1024x178.png" alt="Sieve1" width="465" height="82" ></p>
        <p class="child">According to the algorithm we will mark all the numbers which are divisible by 2.<br><br>
            <img src="../image/sieve/sieve2-1024x177.png" alt="sieve2" width="465" height="82" ></p>
        <p class="child">Now we move to our next unmarked number 3 and mark all the numbers which are multiples of 3.<br><br>
            <img src="../image/sieve/sieve3-1024x177.png" alt="sieve3" width="465" height="82"></p>
        <p class="child">We move to our next unmarked number 5 and mark all multiples of 5.<br><br>
            <img src="../image/sieve/Sieve4-1024x178.png" alt="Sieve4" width="465" height="82" >
        </p>
        <p class="child">We continue this process and our final table will look like below:<br><br>
            <img src="../image/sieve/Sieve5-1024x181.png" alt="Sieve5" width="465" height="82" ></p>
        <p class="child">So the prime numbers are the unmarked ones: 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47.</p>
        <br>
        <h4 class="child">Practice Problem:</h4>
        
        <ol>
            <li><a class="child" href="https://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=704">Fibinary Numbers</a></li>
            <li><a class="child" href="https://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=1275">Alice’s Cube</a></li>
            <li><a class="child" href="https://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=1630">Yet another Number Sequence</a></li>
        </ol>
        
        ';


        echo '<br><br><hr><div>';
        if(!isset($_SESSION['userName']))
            echo '<p class="child" style="color: #1dbbff"> Please <a href="../php/SignIn.php" style="color: #ff0b0e">log in </a>to read full tutorial and left any comment.</p> ';
        if(isset($_SESSION['userName']))
        {
            require_once 'php/connect.php';
            require_once 'php/functions.php';
            require_once 'php/check_com.php';
            echo '
                <div>
                    <form action="" method="post" >
                        <label>enter a brief comment</label>
                        <br />
                        <textarea class="form-text" name="comment" id="comment"></textarea>
                        <br />
                        <input type="submit" class="form-submit" name="new_comment" value="post">
                    </form>
                </div>';
            get_comments();
        }
        echo '</div>';
        ?>
    </div>
    <div class="fot">
        <p align="center">Developed and Maintained by</p>
        <p align="center">A. K. M. RABBY</p>
    </div>
</div>
</body>
</html>