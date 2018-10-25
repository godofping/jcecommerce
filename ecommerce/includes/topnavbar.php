    <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over P800!</a></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <?php 
                    if(!empty($username)){
                        echo'
                         <li class="list-inline-item"><a href="account" >Hi! '.$username.'</a></li>
                         <li class="list-inline-item"><a href="pages/login-register/php_logout" >Logout</a></li>
                        ';
                    }else{
                        echo'
                        <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                        <li class="list-inline-item"><a href="register">Register</a></li>';
                    }
                ?>
                <li class="list-inline-item"><a href="contact">Contact</a></li>
                <?php
                    if(!empty($username)){
                        echo '';
                    }else{
                        echo '';
                    }
                ?>
              </ul>
            </div>
          </div>
        </div>
          
        <!--LOGIN FORM================================================================-->
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Customer login</h5>
                <button type="button" onclick="clearLoginModal();" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="customer-orders.html" method="post">
                  <div class="form-group">
                    <input id="email-modal" type="text" placeholder="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password-modal" type="password" placeholder="password" class="form-control">
                  </div>
                  <p class="text-center">
                      <button class="btn btn-primary" type="button" onclick="loginUser();"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="register"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
              </div>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->
        
      </div>


      <!--====================LOADING=================-->
      <div class="lmodal"><!-- Place at bottom of page --></div>