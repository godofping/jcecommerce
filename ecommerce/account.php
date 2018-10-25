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
               
               <div class="row">
                   
                   <div class="col-lg-3">
                         <!--
                        *** CUSTOMER MENU ***
                        _________________________________________________________
                        -->
                        <div class="card sidebar-menu">
                          <div class="card-header">
                            <h3 class="h4 card-title">Customer section</h3>
                          </div>
                          <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li>
                                <a href="#myorders" data-toggle="tab" class="nav-link active">
                                     <i class="fa fa-list"></i> My orders</a></li>
                                     <li>
                                <a href="#mywishlist" data-toggle="tab" class="nav-link">
                                    <i class="fa fa-heart"></i> My wishlist</a></li>
                                    <li>
                                <a href="#myaccount" data-toggle="tab" class="nav-link">
                                    <i class="fa fa-user"></i> My account</a></li>
                               <!--     <li>
                                <a href="pages/login-register/php_logout" class="nav-link">
                                    <i class="fa fa-sign-out"></i> Logout</a></li>-->
                            </ul>
                          </div>
                        </div>
                       
                   </div>
                   <!-- /.col-lg-3-->
                   <!-- *** CUSTOMER MENU END ***-->
                  
                   
                   <div class="col-lg-9">
                       <div class="box">
                           <div class="tab-content">
                            <div class="tab-pane active" id="myorders">
                                <h1>My Orders</h1>
                                <p class="lead">Your orders on one place.</p>
                                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                                <hr />
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="myorderslist">
                                            
                                        </tbody>
                                     </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="mywishlist">
                                <h1>My Wish List</h1>
                                <hr />
                                <div class="row products" id="wishlistList"></div>
                                
                                
                            </div>

                            <div class="tab-pane" id="myaccount">
                                <h1>My Account</h1>
                                <p class="lead">Change your personal details or your password here.</p>
                                <h3>Change password</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input id="password_old" type="password" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input id="password_1" type="password" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input id="password_2" type="password" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.row-->
                                  <div class="col-md-12 text-center">
                                      <button type="button" onclick="updateUserPassword();" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                               </div>
                                
                                <!--UPDATE INFORMATION==========================-->
                                <h3 class="mt-5">Personal details</h3>
                                <form>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input id="firstname" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input id="lastname" type="text" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.row-->
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="company">Company</label>
                                        <input id="company" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="street">Street</label>
                                        <input id="street" type="text" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.row-->
                                  <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                      <div class="form-group">
                                        <label for="city">City</label>
                                        <input id="city" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                      <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input id="zip" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                      <div class="form-group">
                                        <label for="state">State</label>
                                        <select id="state" class="form-control"></select>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                      <div class="form-group">
                                        <label for="country">Country</label>
                                        <select id="country" class="form-control"></select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input id="phone" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="button" onclick="updateUserInfo();" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                    </div>
                                  </div>
                                </form>
                                
                                
                                
                                
                            </div>
                               
                               
                           </div>
                       
                       </div>
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
       <script src="pages/wish-list/js_wishlist.js"></script>
       <script src="pages/cart/js_cart.js"></script>
       <script src="pages/shop/js_shop.js"></script>
       <script src="pages/my-orders/js_myorders.js"></script>
    </body>
</html>
