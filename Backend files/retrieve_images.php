<?php

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



function Retrieve()
{

 $sql = "select uid,image,likes from images";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

 $image = $row['image'];
 $uid = $row['uid'];
 $likes = $row['likes'];

for($i=0;$i<$image.length;$i++){
	printf("%s %s %s", $image[$i] , $uid[$i] , $likes[$i])
}

}




 CloseCon($conn);


?>