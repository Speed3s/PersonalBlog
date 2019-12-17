

<html>
    <head><title>Homepage</title>
    <link rel="stylesheet" href="css/style3.css">

<body onload="myFunction()">
    
    <div id="wrap">
        <div id="header">
            <h1 id="BlogTitle">Yusuf's Blog</h1>
        </div>
        
        <div id="main">
            <?php
                
                $host = "dbprojects.eecs.qmul.ac.uk";
                $user = "of304";
                $pass = "qpy6jIBDLexm0";
                $db   = "of304";
 
                $conn  =  mysqli_connect ( $host ,  $user ,  $pass, $db );
                if (! $conn ) {
                    die( 'Could not connect: '  .  mysql_error ());
                }

                //Selecting Database
                $db = mysqli_select_db($conn,$db);

                // Checks if the connection has failed, an error message will be displayed
                if ($conn->connect_error) {
                    die("Sorry, the connection has failed: " . $conn->connect_error);
                }
                
                $info = "SELECT ID, Title, contents, DATETIME FROM posts ORDER BY ID DESC";
                $result = $conn -> query($info);
                    if($result -> num_rows == 0){
                        header("Location: addEntry.html");
                    }
                    else if($result -> num_rows > 0)
                    {
                        $count = 1;
                        //this outputs data of each row			
                        while($row = $result  -> fetch_assoc()){
                            
                            echo '<div class="boxPost">';
                            echo 'Entered: ' .$row["DATETIME"];
                            echo '<div id="title">' .$row["Title"] .'</div>';
                            echo '<div id="content">' .$row["contents"] .'</div>';
                            echo '<div id="deleteLink"><a href="deleteEntry.php?id='.$row["ID"].'"> Delete Entry?</a></div>';
                            echo '</div>';
                            echo '<hr>';
                        }
                    }
                    else{
                        echo 'error';
                    }
            ?>
            
        </div>
        <div>
            <ul>
                <header><h2>Find Sections</h2></header>
                <li><a onclick="location.href = 'viewBlog.php';">Home</a></li>
                <li><a onclick="location.href = 'login.html';">Add Entry</a></li>
                <li><a onclick="location.href = 'index.php';">Logout</a></li>
                <div>
                    <a href="https://facebook.com/">
                        <img src = "icon/facebook.png">
                    </a>
                    <a href="https://twitter.com/">
                        <img src = "icon/twitter.png">
                    </a>
                    <a href="https://snapchat.com/">
                        <img src = "icon/snapchat.png">
                    </a>
			    </div>
            </ul>
			
        </div>
        
        <div id="footer">
           Last updated: <p id="demo"></p>
        </div>
    </div>
    
    <script>
        function myFunction() {
            var x = document.lastModified;
            document.getElementById("demo").innerHTML = x;
        }
    </script>
            
</body>