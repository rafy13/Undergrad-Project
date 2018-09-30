<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 10/13/2016
 * Time: 12:25 PM
 */
session_start();
//if(!isset($_SESSION['userName']))
    //header('Location: php/SignIn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Algohunt</title>
    <link rel="stylesheet" href="css/Style.css">
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
            <li class="lih"><a href="index.php">Home</a></li>
            <li class="lih"><a href="contact.php">Contact</a></li>
            <li class="lih"><a href="about.php">About</a></li>
            <?php
            if(!isset($_SESSION['userName']))
                echo ' 
                    <li class="lih" style="float: right"><a href="php/SignIn.php">LOGIN</a></li>
                    <li class="lih" style="float: right"><a href="php/registration.php">REGISTER</a></li>';
            else
                echo '
            <li class="lih" style="float: right"><a href="php/Logout.php">Logout</a></li>';
            ?>
        </ul>
    </div>
    <div class="nav">
        <h4 align="center">Sorting algorithms</h4>
        <ol>
            <li><a class="na" href="pages/Insertion_Sort.php">Insertion Sort</a></li>
            <li><a class="na" href="pages/Selection_Sort.php">Selection Sort</a></li>
            <li><a class="na" href="pages/Quick_Sort.php">Quick sort</a></li>
            <li><a class="na" href="pages/Marge_Sort.php">Marge sort</a></li>
        </ol>
        <h4 align="center">Number Theory</h4>
        <ol>
            <li><a class="na" href="pages/Sieve.php">Sieve</a></li>
            <li><a class="na" href="pages/Eular Totient Function.php">Eular's Totient Function</a></li>
        </ol>
        <h4 align="center">String</h4>
        <ol>
            <li><a class="na" href="pages/KMP.php">KMP Algorithm</a></li>
            <li><a class="na" href="pages/trie.php">Prefix Trie</a></li>
            <li><a class="na" href="pages/LCS.php">Longest Common Subsequence</a></li>
        </ol>

        <h4 align="center">Graph Theory</h4>
        <ol>
            <li><a class="na" href="pages/bfs.php">Breadth First Traversal for a Graph</a></li>
            <li><a class="na" href="pages/dfs.php">Depth First Traversal for a Graph</a></li>
            <li><a class="na" href="pages/dijkstra.php">Dijkstra’s shortest path algorithm</a></li>
            <li><a class="na" href="pages/prims.php">Prim’s algorithm</a></li>
            <li><a class="na" href="pages/kruskal.php">Kruskal’s Minimum Spanning Tree Algorithm</a></li>
        </ol>

    </div>
    <div class="art" style="width: 77%;margin-left: 3%;">
        <div style="margin-top: 100px">
            <h1 align="center" style="color: green">How to start:</h1>
            <ol type="i">
                <li><p class="child">If you are new in competitive programming this site is absolutely for you.You can start with number theory.</p> </li>
                <li><p class="child">The algorithms are nicely categorized, you can learn most important algorithms of any category very easily. </p> </li>
                <li><p class="child">There are some reference problems after every algorithm so that you can practice the algorithm in online judges. This will increase your problem solving skill and helps you
                        to perform batter in competitive programming contest.</p> </li>
                <li><p class="child">If you have any question about any algorithm, you can ask it in the comment section.
                        Actually you can discuss about an algorithm with us and other user in comment section of that algorithm.</p> </li>
                <li><p class="child">If you face any problem, please feel free to <a href="php/contact.php">contact</a>  with us.</p></li>
            </ol>
        </div>

    </div>
    <div class="fot">
           <p align="center">Developed and Maintained by</p>
           <p align="center">A. K. M. RABBY</p>

    </div>
</div>
</body>
</html>