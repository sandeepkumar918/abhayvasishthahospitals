<?php
// Include the database connection
include("Includes/Connection.php");
date_default_timezone_set("Asia/Karachi");

// Check if the slug exists in the URL
if (isset($_GET['slug'])) {
    $PostSlug = ValidateFormData($_GET['slug']);
    // Fetch the Post ID using the slug
    $Query = "SELECT Post_ID FROM blog_post WHERE Post_Slug = '$PostSlug' LIMIT 1";
    $Result = $Connection->query($Query);

    if ($Result && $Result->num_rows > 0) {
        $Row = $Result->fetch_assoc();
        $PostID = $Row['Post_ID'];
    } else {
        echo "<p>Post not found for slug: $PostSlug</p>";
        header("Location: index.php");
        exit();
    }
} else {
    echo "<p>No slug provided.</p>";
    header("Location: index.php");
    exit();
}

// Update Post Stats
$Query = "SELECT * FROM post_visits WHERE Post_ID = '$PostID'";
$Result = $Connection->query($Query);

if ($Result && $Result->num_rows > 0) {
    $Query = "UPDATE post_visits SET Post_Visits = Post_Visits + 1 WHERE Post_ID = '$PostID'";
    $Connection->query($Query);
} else {
    $Query = "INSERT INTO post_visits(Post_ID, Post_Visits) VALUES($PostID, 1)";
    $Connection->query($Query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G6Z6Y153JZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-G6Z6Y153JZ');
</script>

    
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Doctors Archive - Abhyavashistha Hospitals">

    <!-- ========== Page Title ========== -->
    <title>Abhyavashistha Hospitals</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="../assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="../assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="../assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../assets/css/animate.css" rel="stylesheet" />
    <link href="../assets/css/bootsnav.css" rel="stylesheet" />
    <link href="../style.css" rel="stylesheet">
    <link href="../assets_blog/style.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">
    
</head>

<body>

      <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area inline inc-border">
        <div class="container">
            <div class="row">
                <div class="col-md-9 address-info text-left">
                    <div class="info box">
                        <ul style="width: 940px;">
                            <li>
                                <i class="fas fa-map-marker-alt"><a
                                        href="https://maps.app.goo.gl/PfuSnUPHP4K65nMK7"></i> Madanayakanahalli,
                                Madavara Post,<br>Taluk, Bengaluru, Karnataka 562162</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open"></i><a
                                    href="mailto: abhayvasishtha.bng@gmail.com">abhayvasishtha.bng@gmail.com</a>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i><a href="tel: +91 76764 73405">+91 76764 73405</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 social text-right">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100063630353614 "><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="https://x.com/abhayvasishtha/status/1839232582333903087"><i
                                    class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@abhayvasishtha2596"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/abhay-vasishtha-hospital/posts/?feedView=all  "><i
                                    class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/abhayvasishthahospital/ "><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-border navbar-sticky bootsnav">

            <!-- Start Top Search -->
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                   <a class="navbar-brand" href="index.html">
                        <img src="../assets/img/logo.png" class="logo" alt="Logo"style="padding-top: 6px;">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a href="../index.html">Home</a>
                        </li>
                        <li>
                            <a href="../about.html">About</a>
                        </li>
                        <li>
                            <a href="../services.html">Services</a>
                        </li>
                        <li>
                            <a href="../doctors.html">Doctors</a>
                        </li>
                        <li>
                            <a href="../gallery.html">Gallery</a>
                        </li>
                        <li class="active">
                            <a href="../blog.php">Blog</a>
                        </li>
                        <li>
                            <a href="../contact.html">contact</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <div class="widget">
                    <h4 class="title">About</h4>
                    <p>Abhay Vasishtha Hospital is a leading healthcare provider located in Madanayakanahalli,
                        Bangalore. Established in 2019, our hospital has quickly become a trusted destination for
                        individuals seeking medical care. Our team of dedicated professionals is committed to providing
                        top-notch medical services with compassion and care.
                    </p>
                </div>
                <div class="widget">
                    <h4 class="title">Our Department</h4>
                    <ul>
                        <li><a href="services.html">Accident and Emergency Care</a></li>
                        <li><a href="services.html">Neurology</a></li>
                        <li><a href="services.html">Gastroenterology</a></li>
                        <li><a href="services.html">Urology</a></li>
                        <li><a href="services.html">Pulmonology</a></li>
                        <li><a href="services.html">Critical Care And Trauma</a></li>
                    </ul>
                </div>
                <div class="widget social">
                    <h4 class="title">Connect With Us</h4>
                    <ul class="link">
                        <li class="facebook"><a href="https://www.facebook.com/profile.php?id=100063630353614"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="twitter"><a href="https://x.com/abhayvasishtha/status/1839232582333903087"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="pinterest"><a href="https://www.instagram.com/abhayvasishthahospital/ "><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class="dribbble"><a href="https://www.linkedin.com/company/abhay-vasishtha-hospital/posts/?feedView=all  
                            "><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="dribbble"><a href="https://www.youtube.com/@abhayvasishtha2596"><i
                                    class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End Side Menu -->

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
    

        <!-- Page Title -->
       <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url(../assets/img/aboutus.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Blog</h1>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="breadcrumb">
                        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li>blog</li>
                        <li class="active"><?php blogTitle($PostID);?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
        <!-- End Page Title -->

        <!-- start post-body -->
        <div class="w3-row">
            <div class="w3-container"><?php echo isset($CommentMessage) ? $CommentMessage : ""; ?></div>
            <div class="w3-col l8 s12">
                <!-- Display the post content -->
                <?php DisplayPost($PostID); ?>

                <!-- COMMENTS -->
                <div class="w3-margin">
                    <div class="w3-container">
                        <h4><b style="color:black; text-transform:none;">Comments</b></h4>
                        <hr>
                    </div>
                    <form method="post" action="" class="w3-container"
                        style="background-color:aliceblue;padding:30px 10px">
                        <div class="w3-row-padding">
                            <p class="w3-text-red"> <?php echo isset($NameError) ? $NameError : ""; ?></p>
                            <p class="w3-text-red"> <?php echo isset($CommentError) ? $CommentError : ""; ?></p>
                            <div class="w3-quarter">
                                <input name="Name" class="w3-input w3-round" type="text" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="w3-rest">
                                <textarea name="Comment" style="resize: none;" rows="1" class="w3-input w3-round"
                                    placeholder="Your Comment" required></textarea>
                            </div>
                            <input name="PostId" value="<?php echo $PostID ?>" type="hidden">
                            <div style="margin-left:10px;margin-top:20px">
                                <button style="background-color:#FF7C5B;color:white;padding:15px 40px" name="AddComment"
                                    type="submit" class="w3-button w3-white w3-border"><b>Comment</b></button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <?php DisplayComments($PostID); ?>
                </div>
                <!-- END COMMENTS -->
            </div>

            <!-- Sidebar -->
            <div class="w3-col l4">
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4 style="color:black;text-transform: none;">Popular Posts</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php PopularPosts(); ?>
                    </ul>
                </div>
                <hr>
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4 style="color:black;text-transform: none;">Tags</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p><?php Tags(); ?></p>
                    </div>
                </div>
            </div>
            <!-- END Sidebar -->
        </div>
        <!-- end post-body -->


    </div><!-- /.page-wrapper -->
</body>
 <!-- Footer area start -->
<!-- Start Footer 
    ============================================= -->
    <footer>
        <div class="container">
            <div class="row">

                <div class="f-items default-padding">

                    <!-- Single Item -->
                    <div class="col-md-4 item">
                        <div class="f-item">
                            <h4>blog</h4>
                            <p>
                                Abhay Vasishtha Hospital is a leading healthcare provider located in Madanayakanahalli,
                                Bangalore. Established in 2019, our hospital has quickly become a trusted destination
                                for individuals seeking medical care.
                            </p>
                            <a href="tel:+91 76764 73405">
                                <h2><i class="fas fa-phone"></i> +91 76764 73405</h2>
                            </a>
                            <div class="opening-info">
                                <h5>Opening Hours</h5>
                                <ul>
                                    <li> <span> Mon - Sun : &nbsp;&nbsp;&nbsp;&nbsp;24-hours</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 item">
                        <div class="f-item link">
                            <h4>Our Depeartment</h4>
                            <ul>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i> General Medicine</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i> Oncology</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i>Neurology</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i> Urology</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i> Pulmonology</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i> Obstetrics &
                                        Gynecology</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i> Orthopedics &
                                        Physiotherephy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 item">
                        <div class="f-item link">
                            <h4>Quick Links</h4>
                            <ul>
                                <li>
                                    <a href="index.html"><i class="fas fa-arrow-right"></i> Home</a>
                                </li>
                                <li>
                                    <a href="about.html"><i class="fas fa-arrow-right"></i> About Us</a>
                                </li>
                                <li>
                                    <a href="services.html"><i class="fas fa-arrow-right"></i>Services</a>
                                </li>
                                <li>
                                    <a href="doctors.html"><i class="fas fa-arrow-right"></i> Doctors</a>
                                </li>
                                <li>
                                    <a href="gallery.html"><i class="fas fa-arrow-right"></i> Gallery</a>
                                </li>
                                <li>
                                    <a href="contact.html"><i class="fas fa-arrow-right"></i> Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom bg-dark text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; Copyright 2019. All Rights Reserved by <a href="#">Abhay Vasishtha Hospitals</a></p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms of user</a>
                            </li>
                            <li>
                                <a href="#">Privacy & Policy</a>
                            </li>
                            <li>
                                <a href="tel:+91 76764 73405">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->
   <!-- Footer area end -->


<script src="../blog_pages/script-log.js"></script>
<!-- jequery plugins -->
<!-- <script src="../assets/js/jquery.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.js"></script>
<script src="../assets/js/wow.js"></script>
<script src="../assets/js/validation.js"></script>
<script src="../assets/js/jquery.fancybox.js"></script>
<script src="../assets/js/appear.js"></script>
<script src="../assets/js/scrollbar.js"></script>
<script src="../assets/js/jquery.nice-select.min.js"></script>
<script src="../assets/js/jquery-ui.js"></script> -->
 <!-- main-js -->
 <script src="assets/js/script.js"></script>
     <!-- JS here -->
   <script src="../assets/js/jquery-3.6.0.min.js"></script>
   <script src="../assets/js/waypoints.min.js"></script>
   <script src="../assets/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/js/meanmenu.min.js"></script>
   <script src="../assets/js/swiper.min.js"></script>
   <script src="../assets/js/slick.min.js"></script>
   <script src="../assets/js/magnific-popup.min.js"></script>
   <script src="../assets/js/counterup.js"></script>
   <script src="../assets/js/ajax-form.js"></script>
   <script src="../assets/js/beforeafter.jquery-1.0.0.min.js"></script>
   <script src="../assets/js/main.js"></script>

<!-- main-js -->
<script src="../assets/js/script.js"></script>
<script>
    // Feedback Notification
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            document.querySelectorAll('.alert').forEach(alert => alert.classList.add("bounceOutUp"));
        }, 3000);

        setTimeout(function () {
            document.querySelectorAll('.alert').forEach(alert => alert.remove());
        }, 4000);
    });
</script>
</body>

</html>