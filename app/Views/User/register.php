

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">


<!-- Mirrored from themesflat.co/html/ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:40:41 GMT -->
<head>
    <meta charset="utf-8">
    <title>Ecomus - Login</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="assets/User/fonts/fonts.css">
   <link rel="stylesheet" href="assets/User/fonts/font-icons.css">
   <link rel="stylesheet" href="assets/User/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/User/css/swiper-bundle.min.css">
   <link rel="stylesheet" href="assets/User/css/animate.css">
   <link rel="stylesheet"type="text/css" href="assets/User/css/styles.css"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/User/images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/User/images/logo/favicon.png">
    <style>
        .header-default{
            margin-bottom: 0 ! important;
        }
    </style>

</head>

<body class="preload-wrapper popup-loader">

    <!-- RTL -->
    <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a>
    <!-- /RTL  -->

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        
        <!-- Header -->
        <?php include 'app/Views/User/layouts/header.php'?>
       
        <!-- /Header -->
      
        <div class="tf-page-title style-2">
            <div class="container-full">
                <div class="heading text-center">Register</div>
            </div>
        </div>
        <section class="flat-spacing-10">
            <div class="container">
                <div class="form-register-wrap">
                    <div class="flat-title align-items-start gap-0 mb_30 px-0">
                        <h5 class="mb_18">Register</h5>
                        <p class="text_black-2">Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt out, click unsubscribe in our emails</p>
                        <?php 
                        if(isset( $_SESSION['message'])){
                                echo "<p>". $_SESSION['message']."</p>";
                                unset( $_SESSION['message']);
                             }
                             ?>
                    </div>
                    <div>
                        <form class="" id="register-form" action="<?= BASE_URL?>?act=post-register" method="post" accept-charset="utf-8" data-mailchimp="true">
                            
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " type="text" id="property2" name=" name">
                                <label class="tf-field-label fw-4 text_black-2" for="property2">Name</label>
                            </div>
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3" name="email">
                                <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                            </div>
                            <div class="tf-field style-1 mb_30">
                                <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="password">
                                <label class="tf-field-label fw-4 text_black-2" for="property4">Password *</label>
                            </div>
                            <div class="mb_20">
                                <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Register</button>
                            </div>
                            <div class="text-center">
                                <a href="<?= BASE_URL?>?act=login" class="tf-btn btn-line">Already have an account? Log in here<i class="icon icon-arrow1-top-left"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <?php include 'app/Views/User/layouts/footer.php'?>
        
        <!-- /Footer -->
        
    </div>
     
    

    <!-- Javascript -->
    <script type="text/javascript" src="assets/User/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/User/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/User/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="assets/User/js/carousel.js"></script>
    <script type="text/javascript" src="assets/User/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/User/js/lazysize.min.js"></script>
    <script type="text/javascript" src="assets/User/js/count-down.js"></script>
    <script type="text/javascript" src="assets/User/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/User/js/multiple-modal.js"></script>
    <script type="text/javascript" src="assets/User/js/main.js"></script>
</body>


<!-- Mirrored from themesflat.co/html/ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:42:11 GMT -->
</html>