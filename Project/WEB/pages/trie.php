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
        <h1 style="color: green">Prefix Trie :</h1>



        <p class="child">Tri  is an efficient
            information retrieval data structure. Using trie, search complexities can
            be brought to optimal limit (key length). If we store keys in binary
            search tree, a well balanced BST will need time&nbsp;proportional&nbsp;to <strong>M * log N</strong>,
            where M is maximum string length and N is number of keys in tree. Using trie, we can search the key in O(M)
            time. However the penalty is on trie storage requirements.</p>



        <?php
        if(isset($_SESSION['userName']))
            echo '
        <!-- Second part of the article goes here -->
        <p class="child">Every node of trie consists of multiple branches. Each branch represents a possible
            character of keys. We need to mark the last node of every key as leaf node. A trie node field  <em>value</em>
            will be used to distinguish the node as leaf node (there are other uses of the <em>value</em> field). A simple
            structure to represent nodes of English alphabet can be as following :<p/><br>

        <pre>
                        <em style="color: gray">// Trie node</em>
                        struct TrieNode
                        {
                            struct TrieNode *children[ALPHABET_SIZE];

                             <em style="color: gray">// isLeaf is true if the node represents</em>
                             <em style="color: gray">// end of a word</em>
                             bool isLeaf;
                        };
        </pre>
        <p class="child">Inserting a key into trie is simple approach. Every character of input key is inserted as an individual trie node.
            Note that the <em>children</em> is an array of pointers to next level trie nodes. The key character acts as an
            index into the array <em>children</em>. If the input key is new or an extension of existing key, we need to construct
            non-existing nodes of the key, and mark leaf node. If the input key is prefix of existing key in trie, we simply
            mark the last node of key as leaf. The key length determines trie depth.</p>

        <p class="child">Searching for a key is similar to insert operation, however we only compare the characters and move down.
            The search can terminate due to end of string or lack of key in trie. In the&nbsp;former&nbsp;case, if the
            <em>value</em> field of last node is non-zero then the key exists in trie. In the second case, the search
            terminates without examining all the characters of key, since the key is not present in trie.</p>

        <pre>


                       root
                    /   \    \
                    t   <span style="color: #0000ff;">a</span>     b
                    |   |     |
                    h   n     <span style="color: #0000ff;">y</span>
                    |   |  \  |
                    <span style="color: #0000ff;">e</span>   s  <span style="color: #0000ff;">y</span>  <span style="color: #0000ff;">e</span>
                 /  |   |
                 i  r   w
                 |  |   |
                 <span style="color: #0000ff;">r</span>  <span style="color: #0000ff;">e</span>   e
                        |
                        <span style="color: #0000ff;">r</span></pre>
        <h4 class="child">Practice Problem:</h4>
        
        <ol>
            <li><a href="http://uva.onlinejudge.org/external/102/10226.html" ">UVA 10226</a></li>
            <li><a href="http://uva.onlinejudge.org/external/113/11362.html" ">Phonebook</a></li>
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