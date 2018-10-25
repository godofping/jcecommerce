/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.app = {
  
    
    //USER LOGIN 
    userLogin : function (){
      
        var user = new Object();
        
        var userid = id;
        var username = name; 
        
        user['id'] = userid;
        user['name'] = username;
        
        return user;
    },
    
    //Validate Email
    validateEmail : function (email){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    },
    
    //Ajax Call Back
    ajaxCall : function (url,dataType,data,fnCallback){
        return $.ajax({
            type: 'post',
            url: url,
            data: data,
            dataType: dataType,
            beforeSend: function (xhr) {
                $('body').addClass('llmodal');
            },
            success: fnCallback
        });
    },
    
    //Modal Message
    messageBox : function (title,des,type,fnCallback){
        
        return swal({
        title: title,
        text: des,
        type: type,
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes!",
        cancelButtonText: "No!",
        closeOnConfirm: true,
        closeOnCancel: true
      },fnCallback);    
    },
    
    loadingTime : function (fnBack){
        return setTimeout(fnBack,1000);
    }
    
};

