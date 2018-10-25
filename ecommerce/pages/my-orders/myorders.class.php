<?php
require_once '../app.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myorders
 *
 * @author Jessie
 */
class MyOrdes extends App{
    //put your code here
    public $userid;
    
  
    
    
    //GET MY ORDERS 
    function GetMyOrders(){
        
        $gmyorders = "SELECT * FROM tblcart a
                    left join tblproducts b on a.c_productid = b.pr_id
                    WHERE a.c_userid = '$this->userid'";
        
        $rgmyorders = mysqli_query($this->Connect(), $gmyorders);
        if(mysqli_num_rows($rgmyorders)>0){
            
            while($rrgmyorders = mysqli_fetch_array($rgmyorders)){
                echo '
                    <tr>
                        <th>#00'.$rrgmyorders['c_id'].'</th>
                        <td>'.$rrgmyorders['c_date'].'</td>
                        <td>'.$rrgmyorders['pr_price'].'</td>
                        <td><span class="badge badge-info">Being prepared</span></td>
                        <td><a href="item-details.php?productId='.$rrgmyorders['pr_id'].'" class="btn btn-primary btn-sm">View</a></td>
                    </tr>
                ';
            }
            
        }
        
        
    }
    
}//END OF CLAS



//=========================POST REQUEST=========================================

$morders = new MyOrdes();

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
}

if(isset($_POST['gmyorders']) && !empty($_POST['gmyorders'])){
    $userid = filter_input(INPUT_POST, 'userid');
    $morders->userid = $userid;
    $morders->GetMyOrders();
    mysqli_close($morders->Connect());
}