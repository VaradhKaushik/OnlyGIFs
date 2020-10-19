<?php
if(isset($_POST["submit"]))
{
    $imgid=$_POST["imgid"];
    $uid=$_POST["uid"];

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

 

$sql_liked = "CREATE TABLE IF NOT EXISTS liked(
    imgid VARCHAR(10),
    uid VARCHAR(16) NOT NULL,
    PRIMARY KEY (uid,imgid)  
)";



if($conn->query($sql_liked) === true ){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}



$sql1="INSERT INTO persons SET id='$id', first_name='$fn', last_name='$ln', email='$email'";
if($conn->query($sql1) === true){
    echo "Inserted into table successfully.";
} else{
    echo "ERROR: Could not able to execute $sql1. " . $conn->error;
}


 CloseCon($conn);
}

 

?>