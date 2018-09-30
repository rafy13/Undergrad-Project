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
        <h1 style="color: green">Prim's Algorithm</h1>



        <p class="child">Prim’s algorithm is also a Greedy algorithm. It starts with an empty spanning tree. The idea is
            to maintain two sets of vertices. The first set contains the vertices already included in the MST, the other
            set contains the vertices not yet included. At every step, it considers all the edges that connect the two
            sets, and picks the minimum weight edge from these edges. After picking the edge, it moves the other endpoint
            of the edge to the set containing MST.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">A group of edges that connects two set of vertices in a graph is called cut in graph theory. So,
            at every step of Prim’s algorithm, we find a cut (of two sets, one contains the vertices already included in
            MST and other contains rest of the verices), pick the minimum weight edge from the cut and include this vertex
            to MST Set (the set that contains already included vertices).</p><br>
        <p class="child">How does Prim’s Algorithm Work? The idea behind Prim’s algorithm is simple, a spanning tree 
        means all vertices must be connected. So the two disjoint subsets (discussed above) of vertices must be connected
         to make a Spanning Tree. And they must be connected with the minimum weight edge to make it a Minimum Spanning
          Tree.</p><br>
          <h4>Algorithm</h4>
        <pre>
        
            1) Create a set mstSet that keeps track of vertices already included in MST.
            2) Assign a key value to all vertices in the input graph. Initialize all key values as INFINITE. 
            Assign key value as 0 for the first vertex so that it is picked first.
            3) While mstSet doesn’t include all vertices
            ….a) Pick a vertex u which is not there in mstSet and has minimum key value.
            ….b) Include u to mstSet.
            ….c) Update key value of all adjacent vertices of u. To update the key values, iterate through 
                  all adjacent vertices. For every adjacent vertex v, if weight of edge u-v is less than the 
                  previous key value of v, update the key value as weight of u-v
        </pre>
        <br>
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