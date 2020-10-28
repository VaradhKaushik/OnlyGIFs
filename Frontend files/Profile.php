<?php
session_start();
?>

<!DOCTYPE html>
<html style="background: url(&quot;assets/img/batman_interesting.gif&quot;) top / cover;">

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
    <link rel="stylesheet" href="assets/css/Bootstrap-Image-Uploader.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider-1.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="assets/css/Custom-File-Upload.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.css">
    <link rel="stylesheet" href="assets/css/Drag-Drop-File-Input-Upload.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body style="height: 1080px;background: rgba(255,255,255,0);">

    <?php
    function logout()
    {
        echo "<script> alert('Logged Out!'); </script>";
        echo "<script> location.href='http://localhost/Start.html'; </script>";
        exit;
    }

    ?>

    <nav class="navbar navbar-light navbar-expand-md fixed-top" style="color: #ffffff;background: #322f2f;height: 50px;width: 100vw;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: #ffffff;font-size: 31px;margin-top: -15px;">OnlyGIFs</a>
            <ul class="nav navbar-nav">
                <li class="nav-item" style="margin-left: -407px;"><a class="nav-link active" href="HomePage.php" style="color: #ffffff;margin-left: 1300px;font-size: 21px;margin-top: -15px;">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="Start.html" style="color: #ffffff;font-size: 21px;margin-top: -15px;">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="register-photo" style="width: 1015px;margin-left: 210px;margin-top: 230px;background: rgba(41,34,118,0.57);">
        <div class="form-container">
            <form method="post" style="background: rgba(173,134,163,0.41);">
                <h2 class="text-center" style="color: rgb(255,255,255);"><strong>Profile Details</strong></h2><small class="form-text text-white-50" style="color: #ffffff;font-size: 17px;text-align: center;">UID</small>

                <div class="form-group"><input class="form-control-plaintext" type="text" value="<?php echo $_SESSION['uid']; ?>" style="color: #ffffff;font-size: 17px;text-align: center;"></div>

                <small class="form-text text-white-50" style="color: #ffffff;font-size: 17px;text-align: center;">Name</small>

                <div
                    class="form-group"><input class="form-control-plaintext" type="text" value="<?php echo $_SESSION['name']; ?>" style="color: #ffffff;font-size: 17px;text-align: center;"></div>

                    <small class="form-text text-white-50" style="color: #ffffff;font-size: 17px;text-align: center;">Email</small>
        <div
            class="form-group"><input class="form-control-plaintext" type="text" value="<?php echo $_SESSION['email']; ?>"style="color: #ffffff;font-size: 17px;text-align: center;"></div>

    <div class="form-group"><a class="btn btn-primary btn-block" role="button" href="EditProfile.php">Edit Profile</a></div>
    </form>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    <script src="assets/js/Card-Carousel.js"></script>
    <script src="assets/js/Custom-File-Upload.js"></script>
    <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/InfiniteScroll.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>