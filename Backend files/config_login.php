<?php
if(isset($_POST["submit"]))
{
    $uid=$_POST["uid"];
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

 

$sql_insert="";

if($conn->query($sql_insert) === true){
    echo "Inserted into table successfully.";
} else{
    echo "ERROR: Could not able to execute $sql1. " . $conn->error;
}

 
 CloseCon($conn);

}

 

?>




