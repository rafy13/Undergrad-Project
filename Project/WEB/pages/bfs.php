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
        <h1 style="color: green">Breadth First Traversal (or Search):</h1>
        <p class="child">Breadth First Traversal (or Search for a graph is similar to Breadth First Traversal of a tree.
            <span></span> The only catch here is, unlike trees, graphs may contain cycles, so we may come to the same node again.
            To avoid processing a node more than once, we use a boolean visited array.  For simplicity, it is assumed that all vertices are reachable from the starting vertex.<br>
            For example, in the following graph, we start traversal from vertex 2.
            When we come to vertex 0, we look for all adjacent vertices of it.
            2 is also an adjacent vertex of 0. If we don’t mark visited vertices, then 2 will be processed again and it will become a non-terminating process.
            A Breadth First Traversal of the following graph is 2, 0, 3, 1.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p><img src="../image/bfs/BFS.jpg" alt="" title="BFS" width="228" height="181" "></a></p>
        <p class="child">
            The breadth-first-search procedure BFS below assumes that the input graph
            <em>G = (V,E)</em> is represented using adjacency lists. It attaches several additional
            attributes to each vertex in the graph. We store the color of each vertex<em>u &#8712 V</em>
            in the attribute<em>u.color</em>  and the predecessor of<em>u</em>  in the attribute u:. If u has no
            predecessor (for example, if u D s or u has not been discovered), then <em>v. &#960=NIL</em>
            The attribute<em>u.d </em> holds the distance from the source<em> s</em> to vertex<em> u</em> computed by the
            algorithm. The algorithm also uses a first-in, first-out queue Q
            to manage the set of gray vertices. Pseudocode for this procedure is given below: <br><br>
        </p>
        <h4><em>BFS(G,V)</em></h4>
        <ol>
            <li><b>for</b>  each vertex <em>u &#8712 G.V -{s}</em> </li>
            <ol type="i">
                <li <em>u.color=</em>white</li>
                <li <em>u.d=</em>&#8734</li>
            </ol>
            <li <em>s.color=</em>Gray</li>
            <li <em>s.d=</em>0</li>
            <li <em>u. &#960=</em>NIL</li>
            <li <em>Q=&#8709</em></li>
            <li <em>ENQUEUE(Q,s)</em></li>
            <li <b> while </b> <em>Q &#8800 &#8709</em></li>
            <ol type="i">
                <li <em>u=DEQUEUE(Q)</em></li>
                <li><b>for</b>  each<em>v &#8712 G.adj[u]</em> </li>
                <ol type="I">
                    <li <b>if</b> <em>v.color==WHITE</em></li>
                    <ol type="a">
                        <li <em>v.color=</em>GRAY</li>
                        <li <em>v.d=u.d+1</em></li>
                        <li <em>v. &#960=u</em></li>
                        <li <em>ENQUEUE(Q,v)</em></li>
                    </ol>
                </ol>
                <li <em>u.color=</em>BLACK</li>
            </ol>

        </ol>

        <h4 class="child">Practice Problem:</h4>
        
        <ol>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1009">Back to Underworld</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1012">Arranging Amplifiers</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1039">A Toy Company</a></li>
            <li><a class="child" href="http://www.lightoj.com/volume_showproblem.php?problem=1046">Rider</a></li>
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