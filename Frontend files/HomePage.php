<?php
error_reporting(E_ALL);
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>OnlyGifs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider-1.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   
</head>

<body style="background: #303a44;height: 1080px;color: rgb(255,255,255);width: 100vw;">

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
      $_SESSION["conn"] = $conn;
      $sql_liked = "CREATE TABLE IF NOT EXISTS LikedImages(
        uid VARCHAR(200) NOT NULL,
        imgid INT NOT NULL,
        PRIMARY KEY(uid,imgid)
      )";

      if( $conn->query($sql_liked) === false ){
        die("ERROR: Could not able to execute $sql. " . $conn->error);
      }
?>

      <?php
      function getImageURL($num){
      	$conn = $_SESSION["conn"];
        $sql2="SELECT * FROM images";
        $result_2=$conn->query($sql2);
        $rows=mysqli_num_rows($result_2);
        error_log(''.$rows);
        $num=intval($num%$rows);
        if($num==0)
          $num=$rows;
        $sql3 = "SELECT * FROM images where imgid='$num'";  
        $result = $conn->query($sql3);

         
        $arr=array();
        if ($result->num_rows> 0) {
          while($row = $result->fetch_assoc()) {
            $imgsrc=$row["image"];
            $image_base64=explode(';base64,',$imgsrc)[1];
            $image_ur="data:image/gif;base64,$image_base64";

            $caption_text=$row["caption"];

            $userid = $row["uid"];
            array_push($arr, $image_ur, $caption_text,$userid );

          } 
        }
        return $arr;
      }
      ?>


    <script type="text/javascript">

    function refresh1(){

    <?php
    $x1 = rand(1,12);
    echo 'alert('.$x1.');';
	?>
      document.getElementById(String(1)).src = "<?php echo getImageURL($x1)[0]; ?>";
      var caption_id=String(1)+"_caption";
      document.getElementById(caption_id).innerHTML="<?php echo getImageURL($x1)[1]; ?>";
      var user_id=String(1)+"_user";
      document.getElementById(user_id).innerHTML="<?php echo getImageURL($x1)[2]; ?>";
    }


function refresh2(){
    <?php
    $x2 = rand(1,12);
	?>
      document.getElementById(String(2)).src = "<?php echo getImageURL($x2)[0]; ?>";
      var caption_id=String(2)+"_caption";
      document.getElementById(caption_id).innerHTML="<?php echo getImageURL($x2)[1]; ?>";
      var user_id=String(2)+"_user";
      document.getElementById(user_id).innerHTML="<?php echo getImageURL($x2)[2]; ?>";    
    }

function refresh3(){
    <?php
    $x3 = rand(1,12);
	?>
      document.getElementById(String(3)).src = "<?php echo getImageURL($x3)[0]; ?>";
      var caption_id=String(3)+"_caption";
      document.getElementById(caption_id).innerHTML="<?php echo getImageURL($x3)[1]; ?>";
      var user_id=String(3)+"_user";
      document.getElementById(user_id).innerHTML="<?php echo getImageURL($x3)[2]; ?>";    
    }

 function refresh4(){
    <?php
    $x4 = rand(1,12);
	?>
      document.getElementById(String(4)).src = "<?php echo getImageURL($x4)[0]; ?>";
      var caption_id=String(4)+"_caption";
      document.getElementById(caption_id).innerHTML="<?php echo getImageURL($x4)[1]; ?>";
      var user_id=String(4)+"_user";
      document.getElementById(user_id).innerHTML="<?php echo getImageURL($x4)[2]; ?>";    
    }

function refresh5(){
    <?php
    $x5 = rand(1,12);
	?>
      document.getElementById(String(5)).src = "<?php echo getImageURL($x5)[0]; ?>";
      var caption_id=String(5)+"_caption";
      document.getElementById(caption_id).innerHTML="<?php echo getImageURL($x5)[1]; ?>";
      var user_id=String(5)+"_user";
      document.getElementById(user_id).innerHTML="<?php echo getImageURL($x5)[2]; ?>";    
    }

function refresh6(){
    <?php
    $x6 = rand(1,12);
	?>
      document.getElementById(String(6)).src = "<?php echo getImageURL($x6)[0]; ?>";
      var caption_id=String(6)+"_caption";
      document.getElementById(caption_id).innerHTML="<?php echo getImageURL($x6)[1]; ?>";
      var user_id=String(6)+"_user";
      document.getElementById(user_id).innerHTML="<?php echo getImageURL($x6)[2]; ?>";    
    }
    </script>

    <nav class="navbar navbar-light navbar-expand-md fixed-top" style="color: #ffffff;background: #322f2f;height: 50px;width: 100vw;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: #ffffff;font-size: 31px;margin-top: -15px;">OnlyGIFs</a>
            <ul class="nav navbar-nav">
                <li class="nav-item" style="margin-left: -129px;"><a class="nav-link active" href="Profile.php" style="color: #ffffff;margin-left: 935px;font-size: 19px;margin-top: -15px;">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="AddImage.html" style="color: #ffffff;font-size: 19px;margin-top: -15px;margin-left: -678px;width: 198px;background: url(&quot;assets/img/upload_me_harder_daddy.png&quot;) no-repeat;background-size: contain;">&nbsp; &nbsp; &nbsp; &nbsp; Upload GIF</a></li>
                <li
                    class="nav-item"><a class="nav-link" href="Start.html" style="color: #ffffff;font-size: 19px;margin-top: -15px;">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="card-group" style="margin-top: 50px;height: 270px;background: #595757;width: 100vw;border-width: 8px;border-color: #1f2021;">
        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" id="1" style="height: 320px;border-style: none;" src="<?php echo getImageURL(1)[0]; ?>" >
            <div class="card-body" style="background: #475d62;width: 100vw;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;" >

                <span id="1_user"><?php echo getImageURL(1)[2]; ?></span>
                    
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh1()">

                    <i class="fa fa-refresh" style="align: center; "></i></button>

                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="1_caption"><?php echo getImageURL(1)[1]; ?> </p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="2" src="<?php echo getImageURL(2)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">
                    <span id="2_user"><?php echo getImageURL(2)[2]; ?></span>
                  
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh2()">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="2_caption"><?php echo getImageURL(2)[1]; ?></p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="3" src="<?php echo getImageURL(3)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">
                    <span id="3_user"><?php echo getImageURL(3)[2]; ?></span>
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh3()">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="3_caption"><?php echo getImageURL(3)[1]; ?><br></p>
            </div>
        </div>
    </div>

    <div class="card-group" style="margin-top: 200px;height: 270px;background: #595757;width: 100vw;border-width: 8px;border-color: #1f2021;">
        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="4" src="<?php echo getImageURL(4)[0]; ?>">
            <div class="card-body" style="background: #475d62;width: 100vw;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">
                    <span id="4_user"><?php echo getImageURL(4)[2]; ?></span>
                   
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh4()">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="4_caption"><?php echo getImageURL(4)[1]; ?></p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="5" src="<?php echo getImageURL(5)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">
                    <span id="5_user"><?php echo getImageURL(5)[2]; ?></span>
                    
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh5()">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="5_caption"><?php echo getImageURL(5)[1]; ?><br></p>
            </div>
        </div>

        <div class="card" style="width: 640px;"><img class="card-img-top w-100 d-block" style="height: 320px;border-style: none;" id="6" src="<?php echo getImageURL(6)[0]; ?>">
            <div class="card-body" style="background: #475d62;border: 1px solid #222222;">
                <h4 class="card-title" style="color: #ffffff;font-size: 20px;text-align: left;">
                    <span id="6_user"><?php echo getImageURL(6)[2]; ?></span>
                    
                    <button class="btn btn-primary" type="button" style="text-align: center; margin-left: 66px;" onclick="refresh6()">
                    <i class="fa fa-refresh" data-bs-hover-animate="flash" style="align: center; "></i></button>
                </h4>
                <p class="card-text" style="color: rgb(255,255,255);font-size: 16px;" id="6_caption"><?php echo getImageURL(6)[1]; ?><br></p>
            </div>
        </div>
    </div>

</body>

</html>