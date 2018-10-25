<?php 
    require './includes/auth.inc.php';
    $con = new App();
    
    $productId = $_GET['productId'];
    
    $gdetails= "SELECT * FROM tblproducts WHERE pr_id='$productId'";
    $rgdetails = mysqli_query($con->Connect(), $gdetails);
    $pdetails = mysqli_fetch_array($rgdetails);
    

?>
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
  
            <div class="container">
             
                <div class="row">
                    
   
                    
                    
            <div class="col-lg-12">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div class="item"> <img src="<?php echo $pdetails['pr_fimage']; ?>" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="<?php echo $pdetails['pr_bimage']; ?>" alt="" class="img-fluid"></div>
                  </div>
                  <div class="ribbon sale">
                    <div class="theribbon">SALE</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->  
                </div>
                <div class="col-md-6">
                  <div class="box">
                    <h1 class="text-center"><?php echo $pdetails['pr_name']; ?></h1>
                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                    <p class="price">P <?php echo $pdetails['pr_price']; ?></p>
                    <p class="text-center buttons"><a onclick="SaveToCart(<?php echo $productId; ?>);" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a><a onclick="saveWishList(<?php echo $productId ?>);" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>
                  </div>
                  <div data-slider-id="1" class="owl-thumbs">
                      <button class="owl-thumb-item"><img src="<?php echo $pdetails['pr_fimage']; ?>" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="<?php echo $pdetails['pr_bimage']; ?>" alt="" class="img-fluid"></button>
                  </div>
                </div>
              </div>
              <div id="details" class="box">
                <?php echo $pdetails['pr_details']; ?>
                <hr>
                <div class="social">
                  <h4>Show it to your friends</h4>
                  <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                </div>
              </div>
            </div>
            <!-- /.col-md-9-->
                    
                    
                    
                    
                    
            </div>
                
                
            </div>
               
               
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
       <script src="pages/cart/js_cart.js"></script>
       <script src="pages/wish-list/js_wishlist.js"></script>
    </body>
</html>
