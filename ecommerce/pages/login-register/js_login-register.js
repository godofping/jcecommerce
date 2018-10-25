/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
   "use strict";
   var url = "pages/login-register/loginRegister.class.php";
   
   var id = "";
   var name = "";
   var email = "";
   var password = "";
   
   //Who's Login?
   var userid, username = "";
   
   //FOor Login Username and Password
   var log_username, log_password = "";
   
   //UPDATE USER INFO
   var fname, lname, company, street, city, zip, state,
   country, telephone, email = "";
   
   //UPDATE PASSWORD
   var old_pass, new_pass, re_pass = "";
   
   
   
   $(document).ready(function (){
   
    name = $('#name');
    email = $('#email');
    password = $('#password');
   
    //GET USER FROM FORM
    log_username = $('#log_email');
    log_password = $('#log_password');
    
    //UPDATE USER INFo
    fname = $('#firstname');
    lname = $('#lastname');
    company = $('#company');
    street = $('#street');
    city = $('#city');
    zip = $('#zip');
    state = $('#state');
    country = $('#country');
    telephone = $('#phone');
    email = $('#email');
    
    //UPDATE PASSWORD
    old_pass = $('#password_old');
    new_pass = $('#password_1');
    re_pass = $('#password_2');
    
    
    //GET CURRENT USER LOGIN
    userid = app.userLogin().id;
    username = app.userLogin().name;
    
    
    //CALL FUNCTIONS
    getUserInfo();
    
    
   });
   
   
   //UPDATE USER PASSWORD //========================================================
   window.updateUserPassword = function(){
       if(userid === ""){
           swal('Update', 'User is not login', 'warning');
       }else{
           
           if(old_pass.val() === "" || new_pass.val() === "" || re_pass.val() === ""){
                swal('Empty!', 'Some Field(s) is Empty!', 'warning');
           }else{
               var data = {
                   uppassword : 'updateuserpassword',
                   userid : userid,
                   chkpass : old_pass.val(),
                   newpass : new_pass.val(),
               };
               
               app.ajaxCall(url,'',data,function(data){
                   app.loadingTime(function(){
                        $('body').removeClass('llmodal');
                        if(data.toString() === "updated"){
                            swal('Update', 'New Password Successfuly Updated!', 'success');
                            old_pass.val('');
                            new_pass.val('');
                            re_pass.val('');
                       }else if(data.toString() === "notexisted"){
                            swal('Update', 'Your Password Doesn\'t Exist', 'warning');
                       }else{
                           swal('Update', 'Failed to Update New Password!', 'error');
                            console.log(data);
                       }
                    });
                   
                   
                });
           }
           
       }
       
   };
   
   //UPDATE USER INFO //========================================================
   window.updateUserInfo = function (){
       if(userid === ""){
            swal('Update', 'User is not login', 'warning');
       }else{
           
           if(fname.val() === ""){
                swal('Empty', 'Firstname is Empty', 'warning');
           }else if(lname.val() === ""){
                swal('Empty', 'Lastname is Empty', 'warning');
           }else if(email.val() === ""){
                swal('Empty', 'Email Address is Empty', 'warning');
           }else{
                
               var data = {
                    upuserinfo : 'updateduserinfo',
                    userid : userid,
                    firstname : fname.val(),
                    lastname : lname.val(),
                    company : company.val(),
                    street : street.val(),
                    city : city.val(),
                    zip : zip.val(),
                    state : state.val(),
                    country : country.val(),
                    phone : telephone.val(),
                    email : email.val()
               };
               
               app.ajaxCall(url,'',data,function(data){
                  app.loadingTime(function(){
                  $('body').removeClass('llmodal');
                    if(data.toString() === "updated"){
                        swal('Update','Successfuly Updated!','success');
                    }
                  });
               });
           }
       }
   };
   
   
   //GET USER INFO //==============================================================
   var getUserInfo = function (){
       var data = {
           getuserinfo : 'getuserinformations',
           userid : userid
       };
       app.ajaxCall(url,'json',data,function(data){
            app.loadingTime(function(){
                $('body').removeClass('llmodal');
                if(data.length === 0){}else{
                   fname.val(data[0].info_fname);
                   lname.val(data[0].info_lname);
                   company.val(data[0].info_company);
                   street.val(data[0].info_street);
                   city.val(data[0].info_city);
                   zip.val(data[0].info_zipcode);
                   state.val(data[0].info_state);
                   country.val(data[0].info_country);
                   telephone.val(data[0].info_telephone);
                   email.val(data[0].info_email);
                }
            });
       });
   };
   
   //LOGIN USER //==============================================================
   window.loginUser = function (){
       
       var username = (log_username.val() === undefined || log_username.val() === '')? $('#email-modal').val() : log_username.val();
       var password = (log_password.val() === undefined || log_password.val() === '')? $('#password-modal').val() : log_password.val();
     
       if(username === ''){
            swal('Empty Field(s)', 'Email Address is Empty!', 'warning');
       }else if(password === ''){
            swal('Empty Field(s)', 'Password is Empty!', 'warning');
       }else{
           
           var data = {
               loguser : 'loginuser',
               username : username,
               password : password
           };
           app.ajaxCall(url,'',data,function (xdata){
               console.log(xdata);
               app.loadingTime(function(){
                   $('body').removeClass('llmodal');
                   if(xdata.toString() === "success"){
                       swal('Login', 'Successfuly Login','success');
                       document.location.href = "index";
                   }else{
                       swal('Failed', 'Login Failed','error');
                       log_username.val('');
                       log_password.val('');
                   } 
                });
           });
       }
   };
   
   //REGISTER NEW USER //=======================================================
   window.registerNewUser = function (){
      if(name.val() ===  ""){
            swal('Empty Field(s)', 'Name is Empty', 'warning');
      }else if(!app.validateEmail(email.val()) || email.val() === ""){
            swal('Empty Field(s)', 'Email is not Valid or Email Address is Empty', 'warning');
      }else if(password.val() === ""){
            swal('Empty Field(s)', 'Password is Empty', 'warning');
      }else{
          
          var data = {
               savenewuser : 'savenewuser',
               name : name.val(),
               email : email.val(),
               password : password.val()
          };
          
          app.ajaxCall(url,'',data,function(xdata){
              app.loadingTime(function(){
                    $('body').removeClass('llmodal');
                    if(xdata.toString() === "saved"){
                        swal('Register','Successfuly Registered, Please Login','success');
                        clearRegisterForm();
                    }else if(xdata.toString() === "exist"){
                          swal('Register', 'Email Address Already Register, Please Login', 'warning');
                    }else{
                          swal('Register', 'Failed to Register, Please Try Again Later', 'error');
                        clearRegisterForm();
                        console.log(xdata);
                    }
                    
               });
              
          });

      }
   };
   
   //CLEAR MODAL LOGIN //=======================================================
   window.clearLoginModal = function (){
        $('#email-modal').val('');
        $('#password-modal').val('');
   };
   
   //ClEAR REGISTER FORM //=====================================================
   window.clearRegisterForm = function (){
       name.val('');
       email.val('');
       password.val('');
   };
   
   
});

