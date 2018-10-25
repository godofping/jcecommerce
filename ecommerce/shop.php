<?php require './includes/auth.inc.php'; ?>
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
              <!-- breadcrumb
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Ladies</li>
                </ol>
              </nav>-->
              <div class="box">
                <h1>Shop</h1>
                <p>Shop intro here!</p>
              </div>
              <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                      <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                      <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                        <select name="sort-by" class="form-control">
                          <option>Price</option>
                          <option>Name</option>
                          <option>Sales first</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
              
              <div class="row products" id="productlist">
                
                  
                <!-- /.products-->
              </div>
              
              
              
              <!--Boot page-->
              <div class="pages">
                <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /.col-lg-9-->
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
       <script src="pages/shop/js_shop.js"></script>
       <script src="pages/cart/js_cart.js"></script>
    </body>
</html>
