<?php require './includes/auth.inc.php';  ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>E-Commerce</title>
        <?php include './includes/header.ext.php'; ?>
        
    </head>
    <body>
       <!-- navbar-->
       <header class="header mb-5">
       <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <?php include './includes/topnavbar.php'; ?>
      <!--END OF TOP BAR-->
      
      <?php include './includes/topmenu.php'; ?>
      
      </header>
      
       <div id="all">
           <div id="content">
               
               <!--SLIDING-->
               <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div id="main-slider" class="owl-carousel owl-theme">
                        <div class="item"><img src="modules/distribution/img/main-slider1.jpg" alt="" class="img-fluid"></div>
                      <div class="item"><img src="modules/distribution/img/main-slider2.jpg" alt="" class="img-fluid"></div>
                      <div class="item"><img src="modules/distribution/img/main-slider3.jpg" alt="" class="img-fluid"></div>
                      <div class="item"><img src="modules/distribution/img/main-slider4.jpg" alt="" class="img-fluid"></div>
                    </div>
                    <!-- /#main-slider-->
                  </div>
                </div>
              </div><!--/SLIDING-->
               
            <!--
            *** ADVANTAGES HOMEPAGE ***
            _________________________________________________________
            -->
            <div id="advantages">
              <div class="container">
                <div class="row mb-4">
                  <div class="col-md-4">
                    <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                      <div class="icon"><i class="fa fa-heart"></i></div>
                      <h3><a href="#">We love our customers</a></h3>
                      <p class="mb-0">We are known to provide best possible service ever</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                      <div class="icon"><i class="fa fa-tags"></i></div>
                      <h3><a href="#">Best prices</a></h3>
                      <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                      <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                      <h3><a href="#">100% satisfaction guaranteed</a></h3>
                      <p class="mb-0">Free returns on everything for 3 months.</p>
                    </div>
                  </div>
                </div>
                <!-- /.row-->
              </div>
              <!-- /.container-->
            </div>
            <!-- /#advantages-->
            <!-- *** ADVANTAGES END ***-->
            
            <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Hot this week</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
              <div class="row" id="hotweek">
                  
              <!-- /.product-slider-->
            </div>
            <!-- /.container-->
          </div>
          <!-- /#hot-->
          <!-- *** HOT END ***-->
        </div>
            
            
        <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->
        <div class="container">
          <div class="col-md-12">
            <div class="box slideshow">
              <h3>Get Inspired</h3>
              <p class="lead">Get the inspiration from our world class designers</p>
              <div id="get-inspired" class="owl-carousel owl-theme">
                  <div class="item"><a href="#"><img src="modules/distribution/img/getinspired1.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="modules/distribution/img/getinspired2.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="modules/distribution/img/getinspired3.jpg" alt="Get inspired" class="img-fluid"></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- *** GET INSPIRED END ***--> 
            
         <!-- *** FOOTER ***--> 
        <?php include './includes/footer.php'; ?>
         
              
        <!--
        *** COPYRIGHT ***
        _________________________________________________________
        -->
        <?php include './includes/copyright.php'; ?>
        <!-- *** COPYRIGHT END ***-->   
               
               
               
           </div><!--END OF CONTENT-->
       </div> 
       
      
       <?php include './includes/footer.ext.php'; ?>
       <script src="pages/app.js"></script>
       <script src="pages/login-register/js_login-register.js"></script>
       <script src="pages/shop/js_shop.js"></script>
    </body>
</html>
