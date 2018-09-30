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
        <h1 style="color: green">Merge Sort:</h1>
        <p> Merge Sort is a Divide and Conquer algorithm.  It divides input array in two halves, calls itself for the
            two halves and then merges the two sorted halves. <strong>The merge() function</strong> is
            used for merging two halves.  The merge(arr, l, m, r) is key process that assumes that
            arr[l..m] and arr[m+1..r] are sorted and merges the two sorted sub-arrays into one. See following C++
            implementation for details.</p>
        <br><br>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <pre><strong>MergeSort(arr[], l,  r)</strong>

If r &gt; l
     <strong>1. </strong>Find the middle point to divide the array into two halves:
             middle m = (l+r)/2
    <strong> 2. </strong>Call mergeSort for first half:
             Call mergeSort(arr, l, m)
     <strong>3.</strong> Call mergeSort for second half:
             Call mergeSort(arr, m+1, r)
     <strong>4. </strong>Merge the two halves sorted in step 2 and 3:
             Call merge(arr, l, m, r)</pre>

        <p class="child">The following diagram  shows the complete merge sort process for an example
            array {38, 27, 43, 3, 9, 82, 10}. If we take a closer look at the diagram,
            we can see that the array is recursively divided in two halves till the size
            becomes 1. Once the size becomes 1, the merge processes comes into action
            and starts merging arrays back till the complete array is merged.</p>
        <br><br>
        <div style="width: 100%;">
            <img src="../image/Margesort/Merge_Sort.png" style="display: block;margin-left: auto;margin-right: auto;" alt="Marge Sort" width="394" height="380" >
        </div>
        <h4 style="color: green"><em>C++ implementation of marge sort algorithm:</em></h4>
        <pre>


                   <em style="color: gray"> /* C program for Merge Sort */</em>
                    #include<stdlib.h>
                    #include<stdio.h>

                    <em style="color: gray">// Merges two subarrays of arr[].</em>
                    <em style="color: gray">// First subarray is arr[l..m]</em>
                    <em style="color: gray"// Second subarray is arr[m+1..r]></em>
                    void merge(int arr[], int l, int m, int r)
                    {
                        int i, j, k;
                        int n1 = m - l + 1;
                        int n2 =  r - m;

                        /* create temp arrays */
                        int L[n1], R[n2];

                        <em style="color: gray">/* Copy data to temp arrays L[] and R[] */</em>
                        for (i = 0; i < n1; i++)
                            L[i] = arr[l + i];
                        for (j = 0; j < n2; j++)
                            R[j] = arr[m + 1+ j];

                        <em style="color: gray">/* Merge the temp arrays back into arr[l..r]*/</em>
                        i = 0; <em style="color: gray">// Initial index of first subarray</em>
                        j = 0; <em style="color: gray">// Initial index of second subarray</em>
                        k = l; <em style="color: gray">// Initial index of merged subarray</em>
                        while (i < n1 && j < n2)
                        {
                            if (L[i] <= R[j])
                            {
                                arr[k] = L[i];
                                i++;
                            }
                            else
                            {
                                arr[k] = R[j];
                                j++;
                            }
                            k++;
                        }

                        <em style="color: gray">/* Copy the remaining elements of L[], if there are any */</em>
                        while (i < n1)
                        {
                            arr[k] = L[i];
                            i++;
                            k++;
                        }

                        <em style="color: gray">/* Copy the remaining elements of R[], if there are any */</em>
                        while (j < n2)
                        {
                            arr[k] = R[j];
                            j++;
                            k++;
                        }
                    }

                    <em style="color: gray">/* l is for left index and r is right index of the
                       sub-array of arr to be sorted */</em>
                    void mergeSort(int arr[], int l, int r)
                    {
                        if (l < r)
                        {
                            <em style="color: gray">// Same as (l+r)/2, but avoids overflow for
                            // large l and h</em>
                            int m = l+(r-l)/2;

                            <em style="color: gray">// Sort first and second halves</em>
                            mergeSort(arr, l, m);
                            mergeSort(arr, m+1, r);

                            merge(arr, l, m, r);
                        }
                    }

                    <em style="color: gray">/* UTILITY FUNCTIONS */
                    /* Function to print an array */</em>
                    void printArray(int A[], int size)
                    {
                        int i;
                        for (i=0; i < size; i++)
                            printf("%d ", A[i]);
                        printf("\n");
                    }

                    <em style="color: gray">/* Driver program to test above functions */</em>
                    int main()
                    {
                    int arr[] = {12, 11, 13, 5, 6, 7};
                        int arr_size = sizeof(arr)/sizeof(arr[0]);

                        printf("Given array is \n");
                        printArray(arr, arr_size);

                        mergeSort(arr, 0, arr_size - 1);

                        printf("\nSorted array is \n");
                        printArray(arr, arr_size);
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