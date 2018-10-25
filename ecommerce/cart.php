<?php require './includes/auth.inc.php';?>
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
                    
                    <div id="basket" class="col-lg-9">
                        <div class="box">
                            <h1>Shopping cart</h1>
                            <p class="text-muted" id="cart-info"></p>
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Discount</th>
                                    <th colspan="2">Total</th>
                                  </tr>
                                </thead>
                                <!-- USER CART LIST-->
                                <tbody id="myCartList">
                                  
                                 
                                </tbody>
                                <tfoot>
                                  <tr>
                                      <th colspan="5">Total </th>
                                    <th colspan="2" id="totalAmount">P000.00</th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.table-responsive-->
                            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                              <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                              <div class="right">
                                  <button onclick="UpdateMyCart();" class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button>
                                  <button type="button" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                              </div>
                            </div>
                        </div>
                        <!-- /.box-->
                   
                      </div>
                      <!-- /.col-lg-9-->
                      
                      <div class="col-lg-3">
                        <div id="order-summary" class="box">
                          <div class="box-header">
                            <h3 class="mb-0">Order summary</h3>
                          </div>
                          <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Order subtotal</td>
                                  <th id="subtotal"></th>
                                </tr>
                                <tr>
                                  <td>Shipping and handling</td>
                                  <th>P000.00</th>
                                </tr>
                                <tr>
                                  <td>Tax</td>
                                  <th>P000.00</th>
                                </tr>
                                <tr class="total">
                                  <td>Total</td>
                                  <th id="overalltotal"></th>
                                </tr>
                              </tbody>
                            </table>
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
       <script src="pages/shop/js_shop.js"></script>
       <script src="pages/cart/js_cart.js"></script>
       
       
    </body>
</html>
