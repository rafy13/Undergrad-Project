<?php
/**
 * Created by PhpStorm.
 * User: A.K.M.Rabby
 * Date: 2/4/2017
 * Time: 12:40 AM
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
        <h1 style="color: green">Kruskal's Minimum Spanning Tree Algorithm</h1>



        <p class="child">What is Minimum Spanning Tree?<br>
            Given a connected and undirected graph, a spanning tree of that graph is a subgraph that is a tree and
            connects all the vertices together. A single graph can have many different spanning trees. A minimum
            spanning tree (MST) or minimum weight spanning tree for a weighted, connected and undirected graph is a
            spanning tree with weight less than or equal to the weight of every other spanning tree. The weight of a
            spanning tree is the sum of weights given to each edge of the spanning tree.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">Below are the steps for finding MST using Kruskal’s algorithm</p><br>
        
        <pre>
        
            1. Sort all the edges in non-decreasing order of their weight.

            2. Pick the smallest edge. Check if it forms a cycle with the spanning tree 
               formed so far. If cycle is not formed, include this edge. Else, discard it.  

            3. Repeat step#2 until there are (V-1) edges in the spanning tree.
        </pre>
        <br>
        <p class="child">The algorithm is a Greedy Algorithm. The Greedy Choice is to pick the smallest weight edge that 
        does not cause a cycle in the MST constructed so far. Let us understand it with an example: Consider the below 
        input graph.</p><br>
        <h4>Practice Problem:</h4>
        
        <ol>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1029">Civil and Evil Engineer</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1040">Donation</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1041">Road Construction</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1059">Air Ports</a></li>
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