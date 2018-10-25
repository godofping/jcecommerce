<?php
require_once '../app.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shop
 *
 * @author Jessie
 */
class Shop extends App {
    //put your code here
    
    public $p_id;
    public $p_name;
    public $p_details;
    public $p_category;
    public $p_quantity;
    public $p_price;
    public $p_imagefron;
    public $p_imageback;
    
    
    
    
    
    
    
    //GET SHOP LIST
    function GetShopList(){
       
        $gshoplist = "SELECT * FROM tblproducts";
        $rgshoplist = mysqli_query($this->Connect(), $gshoplist);
        if(mysqli_num_rows($rgshoplist)>0){
            while($rrgshoplist = mysqli_fetch_array($rgshoplist)){
                
                $imgFront =  $rrgshoplist['pr_fimage'];
                $imgBack =  $rrgshoplist['pr_bimage'];
                
                $pname = $rrgshoplist['pr_name'];
                $price = $rrgshoplist['pr_price'];
                
                echo '
                    <div class="col-lg-3 col-md-4">
                      <div class="product">
                        <div class="flip-container">
                          <div class="flipper">
                            <div class="front"><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'"><img src="'.$imgFront.'" alt="" class="img-fluid"></a></div>
                            <div class="back"><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'"><img src="'.$imgBack.'" alt="" class="img-fluid"></a></div>
                          </div>
                        </div><a href="detail.html" class="invisible"><img src="'.$imgFront.'" alt="" class="img-fluid"></a>
                        <div class="text">
                          <h3><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'">'.$pname.'</a></h3>
                          <p class="price"> 
                            <del></del>'.$price.'
                          </p>
                          <p class="buttons"><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'" class="btn btn-outline-secondary">View detail</a><a onclick="SaveToCart('.$rrgshoplist['pr_id'].');" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                        </div>
                        <!-- /.text-->
                      </div>
                      <!-- /.product     -->
                    </div>
                ';
                
            }
        }
        
    }
    
    
    //HOT THIS WEEK=============================================================
    function GetHotThisWeek(){
        
        $gshoplist = "SELECT * FROM tblproducts";
        $rgshoplist = mysqli_query($this->Connect(), $gshoplist);
        if(mysqli_num_rows($rgshoplist)>0){
            while($rrgshoplist = mysqli_fetch_array($rgshoplist)){
                
                $imgFront =  $rrgshoplist['pr_fimage'];
                $imgBack =  $rrgshoplist['pr_bimage'];
                
                $pname = $rrgshoplist['pr_name'];
                $price = $rrgshoplist['pr_price'];
                
                echo '
                    <div class="col-lg-3 col-md-4">
                        <div class="product">
                          <div class="flip-container">
                            <div class="flipper">
                              <div class="front"><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'"><img src="'.$imgFront.'" alt="" class="img-fluid"></a></div>
                              <div class="back"><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'"><img src="'.$imgBack.'" alt="" class="img-fluid"></a></div>
                            </div>
                          </div><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'" class="invisible"><img src="'.$imgFront.'" alt="" class="img-fluid"></a>
                          <div class="text">
                            <h3><a href="item-details.php?productId='.$rrgshoplist['pr_id'].'">'.$pname.'</a></h3>
                            <p class="price"> 
                              <del></del>P '.$price.'
                            </p>
                          </div>
                          <!-- /.text-->
                        </div>
                        <!-- /.product-->
                      </div>
                    </div>
                    ';
                
            }
        }
        
    }
    
    
    
}//End of Class





//======================POST REQUEST============================================

$shop = new Shop();


if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

//HOT THIS WEEK
if(isset($_POST['ghotweek']) && !empty($_POST['ghotweek'])){
    $shop->GetHotThisWeek();
}


//GET SHOP LIST
if(isset($_POST['gshoplist']) && !empty($_POST['gshoplist'])){
    
    $shop->GetShopList();
}






