<?php

    $host = "dbprojects.eecs.qmul.ac.uk";
    $userSet = "of304";
    $passSet = "qpy6jIBDLexm0";
    $db = "of304";
    $con=mysqli_connect( $host, $userSet, $passSet, $db);
    mysqli_select_db($con, $db);
    


    if(isset($_POST["button"])){
        session_start();       
        $title = $_POST['getTitle'];
        $body = $_POST['getBody'];
        $date = date('d/m/Y H:i:s');
        $q="INSERT INTO posts(Title, contents, DATETIME) VALUES ('$title', '$body', '$date')";
        $records = mysqli_query($con, $q);
        header('Location: viewBlog.php');
    } else {
        header('Location: addEntry.php');
    }

?>


