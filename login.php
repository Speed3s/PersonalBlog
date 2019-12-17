<?php  

    $host = "dbprojects.eecs.qmul.ac.uk";
    $userSet = "of304";
    $passSet = "qpy6jIBDLexm0";
    $db = "of304";
    $con=mysqli_connect( $host, $userSet, $passSet, $db);  
    
    if (!$con){
        die('Could not connect: '. mysqli_connect_error());
    } 

    if(isset($_POST["login-button"])){ 
        
        if(!empty($_POST['UN']) && !empty($_POST['PW'])) {
                               
            $user=$_POST['UN'];  
            $pass=$_POST['PW'];  
            $q="SELECT * FROM login";
            $result=mysqli_query($con, $q);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    if($user == $row['username'] && $pass == $row['password']){                         
                        header("Location: addEntry.html");
                    } else {
                        header("Location: login.html");
                    }
                }   
            }
        } else {
			header("Location: login.html");
		}   
    } else {
		header("Location: login.html");
	}   
?>

