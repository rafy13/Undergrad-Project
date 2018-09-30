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
        <h1 style="color: green">Depth First Search (or Traversal):</h1>
        <p class="child">Depth First Search—abbreviated as DFS—is a simple algorithm for traversing a graph.
            Starting from a distinguished source vertex, DFS will traverse the graph ‘depth-first’. Every
            time DFS hits a branching point (a vertex with more than one neighbors), DFS will choose
            one of the unvisited neighbor(s) and visit this neighbor vertex. DFS repeats this process and
            goes deeper until it reaches a vertex where it cannot go any deeper. When this happens,
            DFS will ‘backtrack’ and explore another unvisited neighbor(s), if any.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">
            For example, in the following graph, we start traversal from vertex 2. When we come to vertex 0,
            we look for all adjacent vertices of it. 2 is also an adjacent vertex of 0. If we don’t mark visited vertices,
            then 2 will be processed again and it will become a non-terminating process. A Depth First Traversal
            of the following graph is 2, 0, 1, 3
        </p>
        <p><img src="../image/DFS/DFS.jpg " alt="" title="BFS" width="433" height="181" "></a></p>
        <br><br>

        <p class="child">This graph traversal behavior can be implemented easily with the recursive code below.
            Our DFS implementation uses the help of a global vector of integers: <b>vi dfs_num</b> to distinguish
            the state of each vertex. For the simplest DFS implementation, we only use <b>vi dfs_num</b>
            to distinguish between ‘unvisited’ (we use a constant value <b>UNVISITED = -1</b>) and ‘visited’
            (we use another constant value <b>VISITED = 1</b>). Initially, all values in dfs_num are set to
            ‘unvisited’. We will use vi dfs_num for other purposes later. Calling <b>dfs(u)</b> starts DFS
            from a vertex u, marks vertex u as ‘visited’, and then DFS recursively visits each ‘unvisited’
            neighbor v of u (i.e. edge u − v exists in the graph and <b>dfs_num[v] == UNVISITED</b>)</p>
        <br><br>
        <h4 style="color: green"><em>C++ Implementation of Depth First Search:</em></h4>
        <pre>

                    typedef pair &lt tint, int  &gt ii;
                    typedef vector &lt ii &gt vii;          <em style="color: gray;">// Three data type shortcuts. They may look cryptic</em>
                    typedef vector &lt int &gt vi;          <em style="color: gray;">// but they are useful in competitive programming</em>
                    vi dfs_num;                         <em style="color: gray;">// global variable, initially all values are set to UNVISITED</em>
                    void dfs(int u) {                   <em style="color: gray;">// DFS for normal usage: as graph traversal algorithm</em>
                        dfs_num[u] = VISITED;           <em style="color: gray;">// important: we mark this vertex as visited</em>
                        for (int j = 0;j < (int)AdjList[u].size(); j++) {       <em style="color: gray;">// default DS: AdjList</em>
                            ii v = AdjList[u][j];                               <em style="color: gray;">// v is a (neighbor, weight) pair</em>
                            if (dfs_num[v.first] == UNVISITED)                  <em style="color: gray;">// important check to avoid cycle</em>
                            dfs(v.first);                                       <em style="color: gray;">// recursively visits unvisited neighbors of vertex u</em>
                        }
                    }                                   <em style="color: gray;">// for simple graph traversal, we ignore the weight stored at v.second</em>
        </pre>
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