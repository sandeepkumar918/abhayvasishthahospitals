<?php

if (isset($_GET['Tag'])) {
    $TagID = $_GET['Tag'];
} else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>KV | Blog</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="../assets/imgs/logo/favicon.ico">
</head>
<body>
    
</body>
</html>

<div class="page-wrapper">
          <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url(assets/img/aboutus.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Tags</h1>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="breadcrumb">
                        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li>Tag</li>
                        <li class="active"><?php TagByID($TagID);?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

        <!-- <div class="container"> -->
        <!-- Grid -->
        <div class="w3-row">

            <!-- Blog entries -->
            <div class="w3-col l8 s12">
                <!-- Blog entry -->
                <?php DisplayPostsTag($TagID); ?>
                <!-- END BLOG ENTRIES -->
            </div>

            <!-- Introduction menu -->
            <div class="w3-col l4">

                <!-- Posts -->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4 style="color:black; text-transform:none;">Popular Posts</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php PopularPosts(); ?>
                    </ul>
                </div>
                <hr>

                <!-- Labels / tags -->
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4 style="color:black; text-transform:none;">Tags</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p><?php Tags(); ?></p>
                    </div>
                </div>

                <!-- END Introduction Menu -->
            </div>

            <!-- END GRID -->
        </div>
        <!-- </div> -->


    </div><!-- /.page-wrapper -->

        <!-- main-js -->
    <script src="assets/js/script.js"></script>
     <!-- JS here -->
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/waypoints.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/meanmenu.min.js"></script>
   <script src="assets/js/swiper.min.js"></script>
   <script src="assets/js/slick.min.js"></script>
   <script src="assets/js/magnific-popup.min.js"></script>
   <script src="assets/js/counterup.js"></script>
   <script src="assets/js/ajax-form.js"></script>
   <script src="assets/js/beforeafter.jquery-1.0.0.min.js"></script>
   <script src="assets/js/main.js"></script>

        