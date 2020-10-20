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
 
 $conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";


$sql_profile = "CREATE TABLE IF NOT EXISTS profile(
    uid VARCHAR(16) PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL,
)";


if($conn->query($sql_profile) === true ){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

 
 

$sql_insert="INSERT INTO profile SET uid='$uid', name='$name', email='$email', password='$password' ";

if($conn->query($sql_insert) === true){
    echo "Inserted into table successfully.";
} else{
    echo "ERROR: Could not able to execute $sql1. " . $conn->error;
}

 
 CloseCon($conn);

}

 

?>

<!-- // $sql3 = "SELECT * FROM persons";  
// $result = $conn->query($sql3);

 

// if ($result->num_rows> 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " Name: " . $row["first_name"]. " " . $row["last_name"]."Email: " . $row["email"]."<br>";
//   }
// }

 


//  $sql4 = "UPDATE persons SET first_name='hii.hello' WHERE id=2";
//   if ($conn->query($sql4) === TRUE) {
//     echo "Update successful.";
//   } else {
//     echo "Could not update: " . $conn->error;
//   } -->

 



