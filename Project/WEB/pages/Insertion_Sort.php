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

        <h1 style="color: green">Insertion Sort:</h1>
        <p class="child">The <strong>insertion sort</strong>, although still O(n^2, works in a
            slightly different way. It always maintains a sorted sublist in the
            lower positions of the list. Each new item is then “inserted” back into
            the previous sublist such that the sorted sublist is one item larger.
            The figure below shows the insertion sorting process.The shaded items represent
            the ordered sublist as the algorithm makes each pass.<br><br>



            <?php
            if(isset($_SESSION['userName']))
                echo '
        <!-- Second part of the article goes here -->
        <div style="width: 100%;">
            <img src="../image/insertionsort/insertionsort.png" style="display: block;margin-left: auto;margin-right: auto;" alt="" width="473" height="322" >
            </div>
        <p class="child">We begin by assuming that a list with one item (position <i>0</i> is
            already sorted. On each pass, one for each item 1 through <i>(n-1)</i> ,
            the current item is checked against those in the already sorted sublist.
            As we look back into the already sorted sublist, we shift those items
            that are greater to the right. When we reach a smaller item or the end
            of the sublist, the current item can be inserted.</p>

        <p class="child">The figure below shows the fifth pass in detail.At this point in the algorithm,
            a sorted sublist of five items consisting of 17, 26, 54,
            77, and 93 exists. We want to insert 31 back into the already sorted
            items. The first comparison against 93 causes 93 to be shifted to the
            right. 77 and 54 are also shifted. When the item 26 is encountered, the
            shifting process stops and 31 is placed in the open position. Now we
            have a sorted sublist of six items.<br><br></p>

        <div class="figure align-center" id="id2">
            <img src="../image/insertionsort/insertionpass.png"  style="display: block;margin-left: auto;margin-right: auto;" alt="" width="473" height="322" >
        </div>

        <h4 style="color: green"><em>C++ implementation of Insertion sort is given below:</em></h4>
        <pre>


                        <em style="color: gray">// C program for insertion sort</em>
                        #include <stdio.h>
                        #include <math.h>

                        /* Function to sort an array using insertion sort*/
                        void insertionSort(int arr[], int n)
                        {
                           int i, key, j;
                           for (i = 1; i < n; i++)
                           {
                               key = arr[i];
                               j = i-1;

                               <em style="color: gray">/* Move elements of arr[0..i-1], that are
                                  greater than key, to one position ahead
                                  of their current position */</em>
                               while (j >= 0 && arr[j] > key)
                               {
                                   arr[j+1] = arr[j];
                                   j = j-1;
                               }
                               arr[j+1] = key;
                           }
                        }

                       <em style="color: gray">// A utility function ot print an array of size n</em>
                        void printArray(int arr[], int n)
                        {
                           int i;
                           for (i=0; i < n; i++)
                               printf("%d ", arr[i]);
                           printf("\n");
                        }
                        <em style="color: gray">/* Driver program to test insertion sort */</em>
                        int main()
                        {
                            int arr[] = {12, 11, 13, 5, 6};
                            int n = sizeof(arr)/sizeof(arr[0]);

                            insertionSort(arr, n);
                            printArray(arr, n);

                            return 0;
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