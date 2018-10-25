/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function (){
    var url = "pages/my-orders/myorders.class.php";
    //CURRENT USER LOGIN
    var userid, username = "";
    
    
    $(document).ready(function (){
        
        userid = app.userLogin().id;
        username = app.userLogin().name;
       
        
        //CALL FUNCTIONS
        GetMyOrders();
    });
    
    
    
    var GetMyOrders = function (){
      
        var data = {
            gmyorders : 'getmyorders',
            userid : userid
        };
        app.ajaxCall(url,'',data,function (data){
            //console.log(data);
            app.loadingTime(function(){
                $('body').removeClass('llmodal');
                $('#myorderslist').html(data);  
            });
            
        });
    };
    
});

