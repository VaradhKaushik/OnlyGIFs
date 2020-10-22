<?php

 $uid = $_SESSION["uid"];
 $name = $_SESSION["name"]; 
 $email = $_SESSION["email"]; 
 //Fetch the image still remaining
$current_pass = $_POST["current_pass"];
$new_pass = $_POST["new_pass"];


//Code for putting  these values in respective text fields 
function set_values(){}


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
  

function edit_user_details(){

$fetch_pass = "SELECT password from profile where uid = '$uid'"

if ($result_pass = mysqli_query($link, $fetch_pass)) {
	$row_pass = mysqli_fetch_assoc($result_pass)

	if ($current_pass == $row_pass["password"]) {

	$sql = "UPDATE profile SET name = '$name' , email = '$email' , password = '$new_pass' WHERE uid= '$uid' "; 
    
	if ($result = mysqli_query($link, $sql)) {
			echo "Information updated Successfully!!";
		}
	else{
		echo "There was error in updating info! Try again!";
	}

	}

	else{
		echo "Wrong current password!!!";
	}

}

else{
	echo "SQL Connection error!!";
}

}
    

$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";
 
edit_user_details();

 CloseCon($conn);

?>


 



