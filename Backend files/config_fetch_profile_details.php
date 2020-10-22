<?php

 $uid=$_SESSION["uid"];
    
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
  

function get_user_details(){

        print("%s %s %s %s\n", $_SESSION["name"], $_SESSION["email"],$_SESSION["uid"]);
}

    


$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";
 
get_user_details();

 CloseCon($conn);

?>


 



