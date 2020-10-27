<?php
session_start();

 $uid = $_POST["edit_uid"];
 $name = $_POST["edit_name"]; 
 $email = $_POST["edit_email"]; 
// $current_pass = $_POST["current_pass"];
// $new_pass = $_POST["new_pass"];

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
  

function edit_user_details($conn,$name,$email,$uid){

	$sql = "UPDATE profile SET name = '$name' , email = '$email' WHERE uid= '$uid' "; 
    
	if ($result = mysqli_query($conn, $sql)) {
		echo "<script> alert('Information updated Successfully!!'); </script>";
        echo "<script> location.href='http://localhost/HomePage.html'; </script>";
	}
	else{
		echo "<script> alert('There was error in updating info! Try again!'); </script>";}

}

$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";
 
edit_user_details($conn,$name,$email,$uid);

 CloseCon($conn);

?>


 



