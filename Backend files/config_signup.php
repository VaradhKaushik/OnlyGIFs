<?php
if(isset($_POST["submit"]))
{
    $uid=$_POST["uid"];
    $name=$_POST["name"];
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
 


function create_table(){
$sql_profile = "CREATE TABLE IF NOT EXISTS profile(
    uid VARCHAR(16) PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL,
)";


if($conn->query($sql_profile) === true ){
    echo "Table created successfully.";
} else{
    die("ERROR: Could not able to execute $sql. " . $conn->error);
}

 }
 

function verify_signup(){
	$exists=false;

	$sql = "Select * from users where uid='$uid'"; 
    
    $result = mysqli_query($conn, $sql); 
    
    $num = mysqli_num_rows($result);  
    
    if($num == 0) { 
        if($exists==false) { 
                    
            $sql = "INSERT INTO profile VALUES ('$uid',  
                '$name', '$email' , '$password' )"; 
    
            $result = mysqli_query($conn, $sql); 
    
            if ($result) { 
                echo "Registered Successfully!!";  
            } 
        }  
        else {  
            echo "Error registering the user!!";  
        }       

}
    
   if($num>0)  
   { 
      echo "User already exists!!";
   }  
      
}

$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";
 
 CloseCon($conn);

}

 

?>


 



