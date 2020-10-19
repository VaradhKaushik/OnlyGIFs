<?php
if(isset($_POST["submit"]))
{
    $imgid=$_POST["imgid"];
    $uid=$_POST["uid"];
    $image=$_POST["image"];
    $imgname=$_POST["imgname"];
    $likes=$_POST["likes"];
    $caption = $_POST["caption"];

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

 

$sql_images = "CREATE TABLE IF NOT EXISTS images(
    imgid VARCHAR(10) PRIMARY KEY,
    uid VARCHAR(16) NOT NULL,
    image LONGTEXT NOT NULL,
    imgname VARCHAR(20) NOT NULL,
    likes INT(255) NOT NULL,
    caption VARCHAR(300) NOT NULL
)";


if( $conn->query($sql_images) === true ){
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