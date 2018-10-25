/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function (){
   "use strict";
   var url = "pages/wish-list/wishlist.class.php";
   
   var userid, username = "";  
   
   
   $(document).ready(function (){
       
       userid = app.userLogin().id;
       username = app.userLogin().name;
       
       //CALL FUNCTIONS
       getMyWishList();
       
   });
   
   
   //Remove From My Wish List ==================================================
   window.removeWishList = function (proid){
       var data = { removewl : 'removemywishlist', proid: proid };
       app.messageBox('Wish List', 'Are you sure you want to Remove this Item?', 'warning', function(xdata){
           if(xdata){
               app.ajaxCall(url,'',data,function(data){
				   
				   app.loadingTime(function(){
						$('body').removeClass('llmodal');
					   if(data.toString() === "deleted"){
							swal('Remove', 'Successfuly Removed!', 'success');
							getMyWishList();
					   }

					});
                   
               });
           }
       });     
   };
   
   //GET MY WISHLIST ===========================================================
   var getMyWishList = function (){
       var data = { gmywishlist : 'getmywishlist', userid: userid };
       app.ajaxCall(url,'',data,function(xdata){
          //console.log(xdata); 
          app.loadingTime(function(){
				$('body').removeClass('llmodal');
			    $('#wishlistList').html(xdata);    
		  });
        
       });
   };
  
   //SAVE TO MY WISHLIST =======================================================
   window.saveWishList = function(proId){
       
       if(userid === ""){
            swal('Not Login', 'Please Login to Add this in your Wish List', 'warning');
       }else{
           var data = {
               addwl : 'addtowishlist',
               userid : userid,
               proid : proId
           };
           
           app.ajaxCall(url,'',data,function(xdata){
			   app.loadingTime(function(){
					$('body').removeClass('llmodal');
				   	if(xdata.toString() === "saved"){
							swal('Wish List', 'Successfuly added to your wish list','success');
					   }else if(xdata.toString() === "exist"){
						   swal('Wish List', 'Item is Already in your Wish List','warning');
					   }else{
							swal('Wish List', 'Somethings wrong!','error');
							console.log(xdata);
					   }
                    
				});
               
           });
       }
   };
   
});

