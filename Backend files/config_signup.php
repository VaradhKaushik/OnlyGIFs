<?php

session_start();

    $uid=$_POST["UID"];
    $name=$_POST["Name"];
    $email=$_POST["email"];
    $password=$_POST["password"];

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "1234";
 $db = "OnlyGif";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 


function create_table($conn){
$sql_profile = "CREATE TABLE IF NOT EXISTS profile(
    uid VARCHAR(16) PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL)";


if($conn->query($sql_profile) == true ){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute";
}

 }
 

function verify_signup($conn,$uid , $password , $email , $name){
	$exists=false;

	$sql = "Select * from profile where uid = '$uid' "; 
    
    $result = mysqli_query($conn, $sql); 
    
    $num = mysqli_num_rows($result);  
    
    if($num == 0) {           
            $sql = "INSERT INTO profile VALUES ('$uid',  
                '$name', '$email' , '$password' )"; 
        
            $result = mysqli_query($conn, $sql); 
    
            if ($result) { 

                $_SESSION["logged_in"] = true; 
                $_SESSION["uid"] = $uid; 
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                
                echo "<script> alert('Registers Successfully!!'); </script>";
       			echo "<script> location.href='http://localhost/HomePage.php'; </script>";
       			exit; 
            } 
          
        else {  
        	echo "<script> alert('Error registering the user!!'); </script>";
       		echo "<script> location.href='http://localhost/SignUp.html'; </script>";  
        }       

}
else  
{ 
	echo "<script> alert('User already exists!!'); </script>";
    echo "<script> location.href='http://localhost/SignUp.html'; </script>";
}  
      
}


$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";
 
create_table($conn);
verify_signup($conn,$uid , $password , $email , $name);

 CloseCon($conn);


?>


 



