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
        <h1 style="color: green">Longest Common Subsequence:</h1>
        <p class="child">Given two sequences, find the length of longest subsequence present in both of them. A
            subsequence is a sequence that appears in the same relative order, but not necessarily contiguous. For
            example, “abc”, “abg”, “bdf”, “aeg”, ‘”acefg”, .. etc are subsequences of “abcdefg”. So a string of length
            n has 2^n different possible subsequences.</p><br>
        <p class="child">It is a classic computer science problem, the basis of diff (a file comparison program that
            outputs the differences between two files), and has applications in bioinformatics.</p>
        <h4 class="child">Examples:</h4>
        <pre class="child">
                        LCS for input Sequences “ABCDGH” and “AEDFHR” is “ADH” of length 3.
                        LCS for input Sequences “AGGTAB” and “GXTXAYB” is “GTAB” of length 4.
        </pre>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">A <strong>simple solution</strong> is to iterate through all numbers from 1 to n-1 and count numbers with gcd with n as 1.  Below is C implementation of the simple method to compute Euler&#8217;s Totient function for an input integer n.</p>
        <pre>


                    <em style="color: gray">// A simple C program to calculate Euler\'s Totient Function</em>
                    #include &lt;stdio.h&gt;

                    <em style="color: gray">// Function to return gcd of a and b</em>
                    int gcd(int a, int b)
                    {
                        if (a == 0)
                            return b;
                        return gcd(b%a, a);
                    }

                   <em style="color: gray">// A simple method to evaluate Euler Totient Function</em>
                    int phi(unsigned int n)
                    {
                        unsigned int result = 1;
                        for (int i=2; i &lt; n; i++)
                            if (gcd(i, n) == 1)
                                result++;
                        return result;
                    }

                    <em style="color: gray">// Driver program to test above function</em>
                    int main()
                    {
                        int n;
                        for (n=1; n&lt;=10; n++)
                          printf(&quot;phi(%d) = %d\n&quot;, n, phi(n));
                        return 0;
                    }
</pre>

        <p class="child">The above code calls gcd function O(n) times. Time complexity of the gcd function is O(h) where h is number of digits in smaller number of given two numbers.
            Therefore, an upper bound on time complexity of above solution is O(nLogn) [How? there can be at most Log<sub>10</sub>n digits in all numbers from 1 to n]</p>
        <p class="child">Below is a <strong>Better Solution</strong>. The idea is based on Euler&#8217;s product formula which states that value of totient functions is below
            product over all prime factors p of n.<br /></p>
        <p class="child"><img src="../image/eular_phi/eulersproduct.png" alt="eulersproduct" width="187" height="54" > </p>

        <p class="child">The formula basically says that the value of &Phi;(n) is equal to n multiplied by product of (1 &#8211; 1/p) for all prime factors p of n.
            For example value of  &Phi;(6) = 6 * (1-1/2) * (1 &#8211; 1/3) = 2.Below is C implementation of Euler&#8217;s product formula.</p>
        </pre>
        <pre >


                   <em style="color: gray">// C program to calculate Euler\'s Totient Function
                    // using Euler\'s product formula
                   </em>
                    #include &lt;stdio.h&gt;

                    int phi(int n)
                    {
                        float result = n;  <em style="color: gray">// Initialize result as n</em>

                        <em style="color: gray">// Consider all prime factors of n and for every prime</em>
                        <em style="color: gray">// factor p, multiply result with (1 - 1/p)</em>
                        for (int p=2; p*p&lt;=n; ++p)
                        {
                            // Check if p is a prime factor.
                            if (n % p == 0)
                            {
                                // If yes, then update n and result
                                while (n % p == 0)
                                    n /= p;
                                result *= (1.0 - (1.0 / (float) p));
                            }
                        }

                        <em style="color: gray">// If n has a prime factor greater than sqrt(n)</em>
                        <em style="color: gray">// (There can be at-most one such prime factor)</em>
                        if (n &gt; 1)
                            result *= (1.0 - (1.0 / (float) n));

                        return (int)result;
                    }

                    <em style="color: gray">// Driver program to test above function</em>
                    int main()
                    {
                        int n;
                        for (n=1; n&lt;=10; n++)
                          printf(&quot;phi(%d) = %d\n&quot;, n, phi(n));
                        return 0;
                    }
</pre>

        <h4 class="child">Practice Problem:</h4>
        
        <ol>
            <li><a href="http://uva.onlinejudge.org/external/100/10066.html">The Twin Towers </a></li>
            <li><a href="http://uva.onlinejudge.org/external/1/111.html">History Grading</a></li>
            <li><a href="http://uva.onlinejudge.org/external/101/10131.html">Is Bigger Smarter?</a></li>
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