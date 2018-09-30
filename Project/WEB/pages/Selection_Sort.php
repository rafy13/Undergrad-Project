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
        <h1 style="color: green">Selection Sort</h1>



        <p class="child">The selection sort algorithm sorts an array by repeatedly
            finding the minimum element (considering ascending order) from unsorted part and
            putting it at the beginning. </p>
        <p class="child">The algorithm maintains two subarrays in a given array.</P>
        <ol style="margin-left: 35px">
            <li>The subarray which is already sorted.</li>
            <li>Remaining subarray which is unsorted.</li>
        </ol>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">In every iteration of selection sort, the minimum element
            (considering ascending orderfrom the unsorted subarray is picked and moved
            to the sorted subarray.</p>

        <p class="child"><em>Following example explains the above steps</em></p>
        <br>
        <pre>
                    arr[] = 64 25 12 22 11

                    <b>-></b> Find the minimum element in arr[0...4] and place it at beginning
                    11 25 12 22 64

                    <b>-></b> Find the minimum element in arr[1...4] and place it at beginning of arr[1...4]
                    11 12 25 22 64

                    <b>-></b> Find the minimum element in arr[2...4] and place it at beginning of arr[2...4]
                    11 12 22 25 64

                    <b>-></b> Find the minimum element in arr[3...4] and place it at beginning of arr[3...4]
                    11 12 22 25 64
        </pre>

        <h4 style="color: green"><em>C++ implementation of Selection sort is given below:</em></h4>
        <pre>

                    <em style="color: gray">// C program for implementation of selection sort</em>
                    #include <stdio.h>

                    void swap(int *xp, int *yp)
                    {
                        int temp = *xp;
                        *xp = *yp;
                        *yp = temp;
                    }

                    void selectionSort(int arr[], int n)
                    {
                        int i, j, min_idx;

                        <em style="color: gray">// One by one move boundary of unsorted subarray</em>
                        for (i = 0; i < n-1; i++)
                        {
                            <em style="color: gray">// Find the minimum element in unsorted array</em>
                            min_idx = i;
                            for (j = i+1; j < n; j++)
                              if (arr[j] < arr[min_idx])
                                min_idx = j;

                            <em style="color: gray">// Swap the found minimum element with the first element</em>
                            swap(&arr[min_idx], &arr[i]);
                        }
                    }

                    <em style="color: gray">/* Function to print an array */</em>
                    void printArray(int arr[], int size)
                    {
                        int i;
                        for (i=0; i < size; i++)
                            printf("%d ", arr[i]);
                        printf("\n");
                    }

                    <em style="color: gray">// Driver program to test above functions</em>
                    int main()
                    {
                        int arr[] = {64, 25, 12, 22, 11};
                        int n = sizeof(arr)/sizeof(arr[0]);
                        selectionSort(arr, n);
                        printf("Sorted array: \n");
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