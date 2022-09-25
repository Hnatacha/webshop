<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>webshop - Product Listing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/font/icomoon/style.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">


    <link rel="stylesheet" href="../assets/css/lightbox.css">

    

<!--

TemplateMo 571 webshop

https://templatemo.com/tm-571-webshop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <?php include '../components/banner.php'; ?>
    <!-- ***** Header Area End ***** -->
  

  
    <div class="content">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5">
            <span class="d-block text-center my-4 text-muted"> or sign in with</span>
            <div class="social-login text-center">
              <a href="#" class="facebook btn btn-block">
                <span class="icon-facebook mr-3"></span> 
              </a>
              <a href="#" class="twitter btn btn-block">
                <span class="icon-twitter mr-3"></span> 
              </a>
              <a href="#" class="google btn btn-block">
                <span class="icon-google mr-3"></span> 
              </a>
            </div>

          </div>
          <div class="col-md-2 text-center">
            &mdash; or &mdash;
          </div>
          <div class="col-md-5 content">
            <div class="form-block">
            <div class="mb-4">
                  <h3>Sign In to <strong>webshops</strong></h3>
                  <p class="mb-4">veuillez remplir ce formulaire</p>
                </div>
                <form action="#" method="post">
                  <div class="form-group first">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email">

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                    
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                  </div>

                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">

                  
                  
                  
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>

   <!-- ***** Subscribe Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <?php include '../components/footer.php'; ?>
    

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script> 
    <script src="../assets/js/slick.js"></script> 
    <script src="../assets/js/lightbox.js"></script> 
    <script src="../assets/js/isotope.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> 
    
    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>

    <script>

        Rs(function() {
            var selectedClass = "";
            Rs("p").click(function(){
            selectedClass = Rs(this).attr("data-rel");
            Rs("#portfolio").fadeTo(50, 0.1);
                Rs("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              Rs("."+selectedClass).fadeIn();
              Rs("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</php>