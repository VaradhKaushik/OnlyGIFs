<?php

$email_login=$_POST["email_login"];
$password_login=$_POST["password_login"];
echo $email_login;

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
 

function verify_login($conn, $email_login , $password_login)
{
        $result_login = mysqli_query($conn,"SELECT * FROM profile WHERE email = '$email_login' AND  password = '$password_login'");

        if(mysqli_num_rows($result_login) > 0 )
        { 

      	$row_pass = mysqli_fetch_assoc($result_login);

        $_SESSION["logged_in"] = true; 
        $_SESSION["uid"] = $row_pass["uid"];
        $_SESSION["name"] = $row_pass["name"];
        $_SESSION["email"] = $row_pass["email"];
        
        echo "<script> alert('Logged In'); </script>";
        echo "<script> location.href='HomePage.html'; </script>";
        exit;
        }
        else
        {
            echo 'The user does not exist or the password is wrong!';
        }
}

$conn = OpenCon();

 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
 echo "Connected Successfully";

verify_login($conn , $email_login , $password_login);

CloseCon($conn);



?>





