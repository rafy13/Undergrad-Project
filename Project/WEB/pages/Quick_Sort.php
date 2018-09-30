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
        <h1 style="color: green">Quick Sort:</h1>



        <p class="child">The <strong>QuickSort</strong> is a Divide and Conquer algorithm.
            It picks an element as pivot and partitions the given array around the picked pivot.
            There are many different versions of quickSort that pick pivot in different ways.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <ol style="margin-left: 35px">
            <li> Always pick first element as pivot.</li>
            <li> Always pick last element as pivot (implemented below)</li>
            <li> Pick a random element as pivot.</li>
            <li> Pick median as pivot.</li>
        </ol>
        <p class="child">The key process in quickSort is partition().  Target of partitions is, given an array and
            an element x of array as pivot, put x at its correct position in sorted array and put all
            smaller elements (smaller than x) before x, and put all greater elements (greater than x)
            after x.  All this should be done in linear time.</p>
        <div style="width: 100%;">
            <img src="../image/quick_sort/QuickSort.png" style="display: block;margin-left: auto;margin-right: auto;" alt="quicksort" width="703" height="312" ">
        </div>
        <p class="child">There can be many ways to do partition, following pseudo code adopts the
            method given in CLRS book. The logic is simple, we start from the leftmost element and
            keep track of index of smaller (or equal to) elements as i. While traversing, if we
            find a smaller element, we swap current element with arr[i]. Otherwise we ignore current element.</p>
        <br>
        <h4 style="color: green"><em>Pseudo code for quick sort algorithm :</em></h4>
        <pre>


                    Quicksort(A as array, low as int, high as int){
                        if (low &lt; high){
                            pivot_location = Partition(A,low,high)
                            Quicksort(A,low, pivot_location)
                            Quicksort(A, pivot_location + 1, high)
                        }
                    }
                    Partition(A as array, low as int, high as int){
                         pivot = A[low]
                         leftwall = low

                         for i = low + 1 to high{
                             if (A[i] &lt; pivot) then{
                                 swap(A[i], A[leftwall])
                                 leftwall = leftwall + 1
                             }
                         }
                         swap(pivot,A[leftwall])

                        return (leftwall)
                    }
        </pre>
        <h4 class="child">Practice Problem:</h4>
        
        <ol>
            <li><a class="child" href="http://www.spoj.com/problems/ALICECUB/">Alice’s Cube</a></li>
            <li><a class="child" href="http://www.spoj.com/problems/ARRANGE/">Arranging Amplifiers</a></li>
            <li><a class="child" href="http://www.spoj.com/problems/ALICECUB/">Alice’s Cube</a></li>
            <li><a class="child" href="http://www.spoj.com/problems/BLOPER2/">Operators (new ver)</a></li>
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