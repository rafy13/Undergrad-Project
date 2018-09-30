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
        <h1 style="color: green">Knuth-Morris-Pratt’s (KMP) Algorithm</h1>
        <p class="child">We can find all the occurrences of a substring
            P (of length m) in a (long) string T (of length n), if any in Brute force approach . The code is given below with comments, is actually the naive implementation of String Matching algorithm.</p>
        <pre class="child">


            void naiveMatching()
            {
                for (int i = 0; i < n; i++)              <em style="color: gray">// try all potential starting indices</em>
                {
                    bool found = true;
                    for (int j = 0; j < m && found; j++) <em style="color: gray">// use boolean flag ‘found’></em>
                    if (i + j >= n || P[j] != T[i + j])  <em style="color: gray">// if mismatch found</em>
                        found = false;                   <em style="color: gray">// abort this, shift the starting index i by +1</em>
                    if (found)                           <em style="color: gray">// if P[0..m-1] == T[i..i+m-1]</em>
                        printf("P is found at index %d in T\n", i);
                }
            }


        </pre>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">
            This naive algorithm can run in O(n) on average if applied to natural text like the paragraphs
            of this book, but it can run in O(nm) with the worst case programming contest input like
            this: T = ‘AAAAAAAAAAB’ (‘A’ ten times and then one ‘B’) and P = ‘AAAAB’. The naive
            algorithm will keep failing at the last character of pattern P and then try the next starting
            index which is just +1 than the previous attempt. This is not efficient. Unfortunately, a
            good problem author will include such test case in their secret test data.
        </p>
        <p class="child">
            In 1977, Knuth, Morris, and Pratt—thus the name of KMP—invented a better String
            Matching algorithm that makes use of the information gained by previous character comparisons,
            especially those that matches. KMP algorithm never re-compares a character in T
            that has matched a character in P. However, it works similar to the na¨ıve algorithm if the
            first character of pattern P and the current character in T is a mismatch. In the example
            below, comparing P[j] and T[i] and from i = 0 to 13 with j = 0 (the first character of
            P) is no different than the naive algorithm.
        </p>
        <pre class="child">


              1         2         3         4         5
    012345678901234567890123456789012345678901234567890
T = I DO NOT LIKE SEVENTY SEV BUT SEVENTY SEVENTY SEVEN
P = SEVENTY SEVEN
    0123456789012
              1
    ^ the first character of P mismatch with T[i] from index i = 0 to 13
    KMP has to shift the starting index i by +1, as with naive matching.
... at i = 14 and j = 0 ...

              1         2         3         4         5
    012345678901234567890123456789012345678901234567890
T = I DO NOT LIKE SEVENTY SEV BUT SEVENTY SEVENTY SEVEN
              P = SEVENTY SEVEN
                  0123456789012
                            1
                             ^ then mismatch at index i = 25 and j = 11

        </pre>

        <p class="child">
            There are 11 matches from index i = 14 to 24, but one mismatch at i = 25 (j = 11). The
            naive matching algorithm will inefficiently restart from index i = 15 but KMP can resume
            from i = 25. This is because the matched characters before the mismatch is ‘SEVENTY
            SEV’. ‘SEV’ (of length 3) appears as BOTH proper suffix and prefix of ‘<u>SEV</u>ENTY <u>SEV</u>’.
            This ‘SEV’ is also called as the border of ‘SEVENTY SEV’. We can safely skip index i = 14
            to 21: ‘SEVENTY ’ in ‘<u>SEVENTY</u> SEV’ as it will not match again, but we cannot rule out
            the possibility that the next match starts from the second ‘SEV’. So, KMP resets j back to
            3, skipping 11 - 3 = 8 characters of ‘SEVENTY ’ (notice the trailing space), while i remains
            at index 25. This is the major difference between KMP and the naive matching algorithm.
        </p>
        <pre class="child">
... at i = 25 and j = 3 ( this make KMP efficient
              1         2         3         4         5
    012345678901234567890123456789012345678901234567890
T = I DO NOT LIKE SEVENTY SEV BUT SEVENTY SEVENTY SEVEN
P =                       SEVENTY SEVEN
                          0123456789012
                                    1
                             ^ then mismatch at index i = 25 and j = 3

        </pre>
        <p class="child">
            This time the prefix of P before mismatch is ‘SEV’, but it does not have a border, so KMP
            resets j back to 0 (or in another word, restart matching pattern P from the front again).

        </p>
        <pre class="child">
... mismatches from i = 25 to i = 29... then matches from i = 30 to i = 42 ...
              1         2         3         4         5
    012345678901234567890123456789012345678901234567890
T = I DO NOT LIKE SEVENTY SEV BUT SEVENTY SEVENTY SEVEN
P =                               SEVENTY SEVEN
                                  0123456789012
                                            1


        </pre>
        <p>
            This is a match, so P = ‘SEVENTY SEVEN’ is found at index i = 30. After this, KMP
            knows that ‘<u>SEVEN</u>TY <u>SEVEN</u>’ has ‘SEVEN’ (of length 5) as border, so KMP resets j back
            to 5, effectively skipping 13 - 5 = 8 characters of ‘SEVENTY ’ (notice the trailing space),
            immediately resumes the search from i = 43, and gets another match. This is efficient.
        </p>

        <pre class="child">
... at i = 43 and j = 5, we have matches from i = 43 to i = 50 ...
So P = ‘SEVENTY SEVEN’ is found again at index i = 38.
              1         2         3         4         5
    012345678901234567890123456789012345678901234567890
T = I DO NOT LIKE SEVENTY SEV BUT SEVENTY SEVENTY SEVEN
P =                                       SEVENTY SEVEN
                                          0123456789012
                                                    1


        </pre>
        <p class="child">
            To achieve such speed up, KMP has to preprocess the pattern string and get the ‘reset table’
            b (back). If given pattern string P = ‘SEVENTY SEVEN’, then table b will looks like this:
        </p>
        <pre>
                         1
     0 1 2 3 4 5 6 7 8 9 0 1 2 3
P =  S E V E N T Y   S E V E N
b = -1 0 0 0 0 0 0 0 0 1 2 3 4 5

        </pre>
        <p>
            This means, if mismatch happens in j = 11 (see the example above), i.e. after finding
            matches for ‘SEVENTY SEV’, then we know that we have to re-try matching P from index
            j = b[11] = 3, i.e. KMP now assumes that it has matched only the first three characters of
            ‘<u>SEV</u>ENTY <u>SEV</u>’, which is ‘SEV’, because the next match can start with that prefix ‘SEV’.
            The relatively short implementation of the KMP algorithm with comments is shown below.
            This implementation has a time complexity of O(n + m).
            <br><br>
        </p>
         <h4 style="color: green"><em>C++ implementation of KMP algorithm:</em></h4>
        <pre>

            #define MAX_N 100010
            char T[MAX_N], P[MAX_N];                                <em style="color: gray;">// T = text, P = pattern</em>
            int b[MAX_N], n, m;                                     <em style="color: gray;">// b = back table, n = length of T, m = length of P</em>
            void kmpPreprocess() {                                  <em style="color: gray;">// call this before calling kmpSearch()</em>
            int i = 0, j = -1; b[0] = -1;                           <em style="color: gray;">// starting values</em>
                while (i < m) {                                     <em style="color: gray;">// pre-process the pattern string P</em>
                    while (j >= 0 && P[i] != P[j]) j = b[j];        <em style="color: gray;">// different, reset j using b</em>
                    i++; j++;                                       <em style="color: gray;">// if same, advance both pointers</em>
                    b[i] = j;                                       <em style="color: gray;">// observe i = 8, 9, 10, 11, 12, 13 with j = 0, 1, 2, 3, 4, 5</em>
                }
            }                                                       <em style="color: gray;">// in the example of P = "SEVENTY SEVEN" above</em>
            void kmpSearch() {                                      <em style="color: gray;">// this is similar as kmpPreprocess(), but on string T</em>
                int i = 0, j = 0;                                   <em style="color: gray;">// starting values</em>
                while (i < n) {                                     <em style="color: gray;">// search through string T</em>
                    while (j >= 0 && T[i] != P[j])
                        j = b[j];                                   <em style="color: gray;">// different, reset j using b</em>
                    i++; j++;                                       <em style="color: gray;">// if same, advance both pointers</em>
                    if (j == m) {                                   <em style="color: gray;">// a match found when j == m</em>
                        printf("P is found at index %d in T\n", i - j);
                        j = b[j];                                   <em style="color: gray;">// prepare j for the next possible match</em>
                    }
                }
            }
        </pre>
        <h4 class="child">Practice Problem:</h4>
        
        <ol>
            <li><a class="child" href="https://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem=2470"> Extend to Palindrome</a></li>
            <li><a class="child" href="http://uva.onlinejudge.org/external/12/1223.pdf">Editor</a></li>
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