<?php
require_once '../app.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cart
 *
 * @author Jessie
 */
class Cart extends App{
    //put your code here
    public $c_id;
    public $c_userid;
    public $c_pid;
    public $c_size;
    public $c_color;
    public $c_qty;

    
    
    
    //UPDATE MY QUANTITY
    function UpdateQty(){
        $updateqty = "UPDATE tblcart SET c_qty = '$this->c_qty'
                     WHERE c_id = '$this->c_id' AND c_userid = '$this->c_userid'";
        $rupdateqty = mysqli_query($this->Connect(), $updateqty);
        if($rupdateqty){
            echo "updated";
        }
    }
    
    //DELTE MY ITEM
    function DeleteMyItem(){
        $ditem = "DELETE FROM tblcart WHERE c_id = '$this->c_id'";
        $rditem = mysqli_query($this->Connect(), $ditem);
        if($rditem){
            echo "deleted";
        }else{
            echo "error";
        }
    }
    
    
    //GET MY CART LIST
    function GetMyCartList(){
        $gmycart = "SELECT * FROM tblcart a
                    left join tblproducts b on a.c_productid = b.pr_id
                    WHERE a.c_userid = '$this->c_userid'";
        $rgmycart = mysqli_query($this->Connect(), $gmycart);
        if(mysqli_num_rows($rgmycart)>0){
            while($rrgmycart = mysqli_fetch_array($rgmycart)){
                
                $cartId = $rrgmycart['c_id'];
                $productId = $rrgmycart['pr_id'];
                $image = $rrgmycart['pr_fimage'];
                $pname = $rrgmycart['pr_name'];
                $qty = $rrgmycart['c_qty'];
                $price = $rrgmycart['pr_price'];
                
                $total = $qty * $price;
                
                echo '
                    <tr>
                        <td><a href="#"><img src="'.$image.'" alt="White Blouse Armani"></a></td>
                        <td><a href="item-details.php?productId='.$productId.'">'.$pname.'</a></td>
                        <td>
                            <input id="qty" type="number" value="'.$qty.'" class="form-control" onclick="upQuantity('.$cartId.',this.value);">
                        </td>
                        <td>P '.$price.'</td>
                        <td>P 000.00</td>
                        <td>'.$total.'</td>
                        <td><a onclick="DeleteMyItem('.$cartId.')"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                ';
            }
            
        }else{
            
        }
        
    }
    
    //Get Total Number of Carts Added
    function GetTotalNoFromCart(){
       $info_arr = array();
       $gtotalno = "SELECT * FROM tblcart a
                    left join tblproducts b on a.c_productid = b.pr_id
					WHERE a.c_userid = '$this->c_userid'";
       $rgtotalno = mysqli_query($this->Connect(), $gtotalno);
       $totalorder = mysqli_num_rows($rgtotalno);
       $info['totalorder'] =  $totalorder;
       while ($rrgtotalno = mysqli_fetch_assoc($rgtotalno)){
            $qty = $rrgtotalno['c_qty'];
            $price  = $rrgtotalno['pr_price'];
            $total = $qty * $price;
            $ttotal[] = $total; 
            $info['totalamount'] = array_sum($ttotal);
            
            array_push($info_arr, $info);
       }
       
       
       echo json_encode($info_arr);
    }
    
    //SAVE TO CART
    function SaveToCart(){
        
        $chkp = "SELECT * FROM tblcart WHERE c_productid = '$this->c_pid' and c_userid = '$this->c_userid'";
        $rchkp = mysqli_query($this->Connect(), $chkp);
        if(mysqli_num_rows($rchkp)>0){
            echo "Already Added";
        }else{
            $save = "INSERT INTO tblcart(c_productid, c_userid, c_qty, c_date) VALUES ('$this->c_pid', '$this->c_userid', '1', date(now()))";
            $rsave = mysqli_query($this->Connect(), $save);
            if($rsave){
                echo "added";
            }else{
                echo "error" . mysqli_error($this->Connect());
            }
        }
    }

    
    
    
}//End of class

//================================POST REQUEST==================================

$cart = new Cart();


if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}


if(isset($_POST['updateqty']) && !empty($_POST['updateqty'])){
    $proid = filter_input(INPUT_POST, 'proid');
    $qty = filter_input(INPUT_POST, 'qty');
    $userid = filter_input(INPUT_POST, 'userid');

	
	$cart->c_userid = $userid;
    $cart->c_id = $proid;
    $cart->c_qty = $qty;
    $cart->UpdateQty();
    mysqli_close($cart->Connect()); 
}


//DELETE ITEM 
if(isset($_POST['dmyitem']) && !empty($_POST['dmyitem'])){
    $prId = filter_input(INPUT_POST, 'pr_id');
    $cart->c_id = $prId;
    $cart->DeleteMyItem();
    mysqli_close($cart->Connect());
}

//GET TOTAL ORDER
if(isset($_POST['gtotalno']) && !empty($_POST['gtotalno'])){
	$userid = filter_input(INPUT_POST, 'userid');
    $cart->c_userid = $userid;
    $cart->GetTotalNoFromCart();
    mysqli_close($cart->Connect());    
}

//GET MY CART LIST
if(isset($_POST['mycart']) && !empty($_POST['mycart'])){
    $userid = filter_input(INPUT_POST, 'userid');
    $cart->c_userid = $userid;
    $cart->GetMyCartList();
    mysqli_close($cart->Connect());
}

//SAVE TO CART
if(isset($_POST['savetoCart']) && !empty($_POST['savetoCart'])){
    $pr_id = filter_input(INPUT_POST, 'pr_id');
    $userid = filter_input(INPUT_POST, 'userid');
    $cart->c_pid = $pr_id;
    $cart->c_userid = $userid;
    $cart->SaveToCart();
    mysqli_close($cart->Connect());
}
