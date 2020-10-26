<?php
# If upload button is clicked
if(isset($_POST['but_upload'])){

  # Caption is the only POST input
  $caption = $_POST["caption"];


  #Establish connection with phpmyadmin
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




  # Create the images table which will store details about the images
  # Note that the image will be base64 encoded and will be stored as a longtext datatype in the table
  $sql_images = "CREATE TABLE IF NOT EXISTS images(
  imgid INT AUTO_INCREMENT PRIMARY KEY ,
        -- uid INT AUTO_INCREMENT NOT NULL,
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


  # If file uploaded was 1.gif
  # Name : 1.gif
  # target file : uploads/1.gif
  # Image File Type : gif
  $name = $_FILES['file']['name'];
  echo "Name : $name";

  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  echo "Target file : $target_file";

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  echo "Image File Type : $imageFileType";

  # Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  # Check if the image user uploaded is a valid one defined above
  if( in_array($imageFileType,$extensions_arr) ){

        # convert to base 64 string
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );

        # image : full data path ie data:image/gif;base64,AABBCC...
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        
        #Insert the image details into the images table
        $sql1="INSERT INTO images SET image='$image', imgname='$name', caption='$caption', likes='0'";
        if($conn->query($sql1) === true){
          echo "Inserted into table successfully.";
        } else{
          echo "ERROR: Could not able to execute $sql1. " . $conn->error;
        }

        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

        # Display the uploaded image to the user ie data:image/gif;base64,AABBCC... where the latter is called the image url
        echo '<img src="data:image/gif;base64,' . $image_base64 . '" />';

        CloseCon($conn);
  }

}
?>