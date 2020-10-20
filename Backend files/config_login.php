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
 

function create_table(){

$sql_profile = "CREATE TABLE IF NOT EXISTS profile(
    uid VARCHAR(16) PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL,
)";


if($conn->query($sql_profile) === true ){
    echo "Table created successfully.";
}

else{
    die("ERROR: Could not able to execute $sql. " . $conn->error);
}

 }


function verify_login()
{
        $result1 = mysql_query("SELECT uid , password FROM profile WHERE uid = '".$uid."' AND  password = '".$password."'");

        if(mysql_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["uid"] = $uid; 
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
}




$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";

create_table();
verify_login();

CloseCon($conn);

}

 


?>




