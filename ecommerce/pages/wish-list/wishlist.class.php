<?php
require_once '../app.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wishlist
 *
 * @author Jessie
 */
class WishList extends App{
    //put your code here
    public $wl_id;
    public $wl_userid;
    public $wl_proid;
    
   
    //DELETE WISH LIST ITEM
    function DeleteWishLis(){
        $dw = "DELETE FROM tblwishlist WHERE wl_id = '$this->wl_id'";
        $rdw = mysqli_query($this->Connect(), $dw);
        if($rdw){
            echo "deleted";
        }else{
            echo "error: " . mysqli_error($this->Connect());
        }
    }
    
    //GET MY WISH LIST  
    function  GetMyWishList(){
        $gwl = "SELECT * FROM tblwishlist a
                left join tblproducts b on a.wl_proid = b.pr_id
                WHERE a.wl_userid = '$this->wl_userid'";
        $rgwl = mysqli_query($this->Connect(), $gwl);
        if(mysqli_num_rows($rgwl)>0){
            while($rrgwl = mysqli_fetch_array($rgwl)){
                
                $id = $rrgwl['wl_id'];
                $prid = $rrgwl['pr_id'];
                $prname = $rrgwl['pr_name'];
                $prpirce = $rrgwl['pr_price'];
                $primage = $rrgwl['pr_fimage'];
                $prbiamge= $rrgwl['pr_bimage'];
                
                echo '
                    <div class="col-lg-3 col-md-4">
                    <div class="product">
                      <div class="flip-container">
                        <div class="flipper">
                          <div class="front"><a href="item-details.php?productId='.$prid.'"><img src="'.$primage.'" alt="" class="img-fluid"></a></div>
                          <div class="back"><a href="item-details.php?productId='.$prid.'"><img src="'.$prbiamge.'" alt="" class="img-fluid"></a></div>
                        </div>
                      </div><a href="item-details.php?productId='.$prid.'" class="invisible"><img src="'.$primage.'" alt="" class="img-fluid"></a>
                      <div class="text">
                        <h3><a href="item-details.php?productId='.$prid.'">'.$prname.'</a></h3>
                        <p class="price"> 
                          <del></del>'.$prpirce.'
                        </p>
                        <p class="buttons"><a href="item-details.php?productId='.$prid.'" class="btn btn-outline-secondary">View detail</a>
                        <a onclick="SaveToCart('.$prid.');" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        <a onclick="removeWishList('.$id.');" class="btn btn-danger"><i class="fa fa-trash-o"></i>Remove</a></p>
                      </div>
                      <!-- /.text-->
                    </div>
                    <!-- /.product-->
                  </div>
                ';
            }
        }   
        
    }
    
    //SAVE WISH LIST
    function SaveWishList(){
        $chkpro = "SELECT * FROM tblwishlist WHERE wl_proid = '$this->wl_proid' AND wl_userid='$this->wl_userid'";
        $rchkpro = mysqli_query($this->Connect(), $chkpro);
        if(mysqli_num_rows($rchkpro)>0){
            echo "exist";
        }else{
            
            $savewl = "INSERT INTO tblwishlist(wl_userid, wl_proid)"
                    . "VALUES('$this->wl_userid', '$this->wl_proid')";
            $rsavewl = mysqli_query($this->Connect(), $savewl);
            if($rsavewl){
                echo "saved";
            }else{
                echo "error: ". mysqli_error($this->Connect());
            }
            
        }
        
    }
    
}//END OF CLASS




//=======================POST REQUEST===================================///

$wl = new WishList();


if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}


//REMOVE WISH LIST ITEM===
if(isset($_POST['removewl']) && !empty($_POST['removewl'])){
    
    $proid = filter_input(INPUT_POST, 'proid');
    $wl->wl_id = $proid;
    $wl->DeleteWishLis();
    mysqli_close($wl->Connect());
    
}

// GET MY WISH LIST
if(isset($_POST['gmywishlist']) && !empty($_POST['gmywishlist'])){
    $userid = filter_input(INPUT_POST, 'userid');
    $wl->wl_userid = $userid;
    $wl->GetMyWishList();
    mysqli_close($wl->Connect());
}

//SAVE WISH LIST
if(isset($_POST['addwl']) && !empty($_POST['addwl'])){
    $userid = filter_input(INPUT_POST, 'userid');
    $proid  = filter_input(INPUT_POST, 'proid');
    $wl->wl_userid = $userid;
    $wl->wl_proid = $proid;
    $wl->SaveWishList();
    mysqli_close($wl->Connect());
}

