<?php

$host = "dbprojects.eecs.qmul.ac.uk";
$userSet = "of304";
$passSet = "qpy6jIBDLexm0";
$db = "of304";
$con=mysqli_connect( $host, $userSet, $passSet, $db);
mysqli_select_db($con, $db);
       
session_start();  
$id = $_GET['id']; 
$sql = "DELETE FROM posts WHERE ID = $id";
$con->query($sql);
if ($con->query($sql) == TRUE) {
    header('Location: viewBlog.php');
} 
    
   

?>


