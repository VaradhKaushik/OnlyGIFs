<?php
session_start();
?>


<!DOCTYPE html>
<html style="background: url(&quot;assets/img/kermit_typing.gif&quot;) center / cover no-repeat;height: 1080px;">

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

<body style="background: rgba(85,163,235,0);">
    <nav class="navbar navbar-light navbar-expand-md fixed-top" style="color: #ffffff;background: #322f2f;height: 50px;width: 100%;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color: #ffffff;font-size: 31px;margin-top: -15px;">OnlyGIFs</a>
            <ul class="nav navbar-nav">
                <li class="nav-item" style="margin-left: 50px;"><a class="nav-link active" href="HomePage.html" style="color: #ffffff;margin-left: -373px;font-size: 21px;margin-top: -15px;width: 91px;">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="LikedImages.html" style="color: #ffffff;font-size: 21px;margin-top: -15px;margin-left: -259px;width: 147px;">Liked Images</a></li>
                <li class="nav-item"><a class="nav-link" href="Start.html" style="color: #ffffff;font-size: 21px;margin-top: -15px;margin-left: -100px;">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="register-photo" style="width: 939px;margin-left: 267px;margin-top: 230px;background: rgba(78,104,47,0.56);">
        <div class="form-container">
            <form method="post" style="background: rgba(23,24,23,0.56);" action="http://localhost/config_edit_profile_details.php">
                <h2 class="text-center" style="color: rgb(255,255,255);"><strong>Edit Profile Details</strong></h2>
                <small class="form-text text-white-50" style="color: #ffffff;font-size: 17px;text-align: center;">UID</small>
                <div class="form-group"><input class="form-control-plaintext" type="text" name="edit_uid" id="edit_uid" value="<?php echo $_SESSION['uid']; ?>" style="color: #ffffff;font-size: 17px;text-align: center;">
                </div>

                <small class="form-text text-white-50" style="color: #ffffff;font-size: 17px;text-align: center;">Username<input class="form-control" name="edit_name" id="edit_name" value="<?php echo $_SESSION['name']; ?>" type="text" style="background: rgba(255,255,255,0.2);"></small>

                <small
                    class="form-text text-white-50" style="color: #ffffff;font-size: 17px;text-align: center;">Email<input class="form-control" name="edit_email" id="edit_email" type="text" value="<?php echo $_SESSION['email']; ?>" style="background: rgba(255,255,255,0.2);"></small>

                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Save Changes</button></div>
                
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