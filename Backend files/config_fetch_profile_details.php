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

	$sql = "Select * from users where uid='$uid'"; 
    
	if ($result = mysqli_query($link, $sql)) {

  		$row = mysqli_fetch_assoc($result)
        print("%s %s %s %s\n", $row["name"], $row["email"],$row["uid"],$row["password"]);
    
    	mysqli_free_result($result);
}

else{

}
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


 



