<?php

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

	// $fetch_pass = "SELECT password from profile where uid = '$uid'"

	// if ($result_pass = mysqli_query($link, $fetch_pass)) {
	// $row_pass = mysqli_fetch_assoc($result_pass)

	// if ($current_pass == $row_pass["password"]) {

	$sql = "UPDATE profile SET name = '$name' , email = '$email' WHERE uid= '$uid' "; 
    
	if ($result = mysqli_query($conn, $sql)) {
		echo "<script> alert('Information updated Successfully!!'); </script>";}
	else{
		echo "<script> alert('There was error in updating info! Try again!'); </script>";}
	// }
	else{
		echo "<script> alert('Wrong Current Password!!'); </script>";}
}

// else{
// 	echo "SQL Connection error!!";
// }

// }
    

$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";
 
edit_user_details($conn,$name,$email,$uid);

 CloseCon($conn);

?>


 



