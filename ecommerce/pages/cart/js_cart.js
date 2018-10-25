/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function (){
   "use strict";
   var url = "pages/cart/cart.class.php";

   
	
   $(document).ready(function (){
       
   //FUNCTIONS
      GetMyCart();
      GetTotalCatNo();
      

   });
   
   
   //UPDATE MY CART
   window.UpdateMyCart = function (){
      GetMyCart();
      GetTotalCatNo();
   };
   
  //UPDATE Quantity
  window.upQuantity = function (prid,qty){
	  console.log(prid);
      if(qty < 0){
            swal('Quantity', 'Quantity must not be less than 0', 'error');
            $('#qty').val('0');
      }else{
         
          var data = {
              updateqty : 'updateqty',
              proid : prid,
              qty :qty,
			  userid : app.userLogin().id
          };
          app.ajaxCall(url, '', data, function (data){
              console.log(data);
              app.loadingTime(function(){
                $('body').removeClass('llmodal');
                     if(data.toString() === "updated"){
                
                        GetMyCart();
                     }
               });
            
          });
      }
  };
   
   
  //DELETE MY ITEM 
  window.DeleteMyItem = function(proId){
      
      app.messageBox('Delete?','Are you sure you want to Delete this Item?','warning',function(xdata){
         if(xdata){
          var data = { dmyitem : 'deletemyitem', pr_id: proId };
          app.ajaxCall(url,'',data,function (xdata){
                console.log(xdata);
                app.loadingTime(function(){
                    $('body').removeClass('llmodal');
                    if(xdata.toString() === "deleted"){
                        swal('Deleted','Successufly Deleted!','success');
                        GetMyCart();
                        GetTotalCatNo();
                    }
                });
                
            });
        }
          
      });
      
      
  };
   
   //GET MY CART 
  var GetMyCart = function (){
      var data = { mycart : 'getmycart', userid : app.userLogin().id };
      app.ajaxCall(url,'',data,function (xdata){
          //console.log(xdata);
          app.loadingTime(function(){
              $('body').removeClass('llmodal');
              $('#myCartList').html(xdata);
          });
      });
  };
   
   //GET TOTAL NUMBER FROM MY CART
   var GetTotalCatNo = function (){
       var data = { gtotalno : 'gettotalnumberfrommycart', userid : app.userLogin().id };
       app.ajaxCall(url,'json',data,function(xdata){
           //console.log(xdata);
           app.loadingTime(function(){
                $('body').removeClass('llmodal');
                var tIndex = (xdata <= 0)? '0' : xdata[0].totalorder -1;
                var tOrder = (xdata <= 0)? '0' :  xdata[0].totalorder; // TOTAL ORDER
                var totalAmount = (xdata <= 0)? '0' : xdata[tIndex].totalamount; // TOTAL AMOUNT
                $('#item-cart').html(tOrder+' items in cart');
                $('#totalAmount').html('P '+totalAmount);
                $('#subtotal').html('P '+totalAmount);
                $('#overalltotal').html('P '+ totalAmount);
                $('#cart-info').html('You currently have '+tOrder+' item(s) in your cart.');
            });
       });
   };
   
   //SAVE TO CART 
   window.SaveToCart = function (proId){
       if(app.userLogin().id === "" || app.userLogin().id === undefined){
            swal('Not Login', 'Please Login to add this in your Cart','warning');
       }else{
        var data = { savetoCart : 'savetocartproduct', pr_id : proId, userid : app.userLogin().id }; 
        app.ajaxCall(url,'',data,function (xdata){
            app.loadingTime(function(){
                $('body').removeClass('llmodal');
                if(xdata.toString() === "added"){
                    swal('Item Added', 'Item Successfuly Added', 'success');
                    GetTotalCatNo();
                }
                if(xdata.toString() === "Already Added"){
                    swal('Already Added', 'Item Already Added', 'warning');
                }
            });
            
        });
      } 
   };
    
});




