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
        <h1 style="color: green">Dijkstra's Shortest Path Algorithm:</h1>



        <p class="child">Given a graph and a source vertex in graph, find shortest paths from source to all vertices in the given graph.

            Dijkstra’s algorithm is very similar to Prim’s algorithm for minimum spanning tree. Like Prim’s MST, we
            generate a SPT (shortest path tree) with given source as root. We maintain two sets, one set contains
            vertices included in shortest path tree, other set includes vertices not yet included in shortest path tree.
            At every step of the algorithm, we find a vertex which is in the other set (set of not yet included) and has
            minimum distance from source.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">Below are the detailed steps used in Dijkstra’s algorithm to find the shortest path from a 
        single source vertex to all other vertices in the given graph.</p><br>
        <h4>Algorithm</h4>
        <pre>
        1)  Create a set sptSet (shortest path tree set) that keeps track of vertices included in shortest path tree, 
            i.e., whose minimum distance from source is calculated and finalized. Initially, this set is empty.
        2)  Assign a distance value to all vertices in the input graph. Initialize all distance values as INFINITE. 
            Assign distance value as 0 for the source vertex so that it is picked first.
        3) While sptSet doesn’t include all vertices
            ….a) Pick a vertex u which is not there in sptSetand has minimum distance value.
            ….b) Include u to sptSet.
            ….c) Update distance value of all adjacent vertices of u. To update the distance values, iterate through all 
        </pre>
        <br>
        <p class="child">adjacent vertices. For every adjacent vertex v, if sum of distance value of u (from source) and 
        weight of edge u-v, is less than the distance value of v, then update the distance value of v. input graph.</p><br>
        <h4>Practice Problem:</h4>
        
        <ol>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1002">Country Roads</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1019">Brush (V)</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1099">Not the Best</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1174">Commandos</a></li>
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