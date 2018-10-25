/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function (){
    "use strict";
    var url = "pages/shop/shop.class.php";
    
    $(document).ready(function (){
        
        
        //CALL FUNCTIONS
        GetShopList();
        GetHotThisWeek();
        
    });
    
    //GET HOT THIS WEEK ========================================================
    var GetHotThisWeek = function (){
        var data = { ghotweek : 'getshoplist' };
        app.ajaxCall(url,'',data,function(xdata){
            //console.log(xdata);
            app.loadingTime(function(){
                $('body').removeClass('llmodal'); 
                $('#hotweek').html(xdata);
            });
        });
    };
    
    //GET SHOP LIST ============================================================
    var GetShopList = function (){
        var data = { gshoplist : 'getshoplist' };
        app.ajaxCall(url,'',data,function(xdata){
            //console.log(xdata);
            app.loadingTime(function(){
                $('body').removeClass('llmodal'); 
                $('#productlist').html(xdata);
            });
        });
    };
    
});

 