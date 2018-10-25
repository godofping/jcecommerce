<?php
require_once '../app.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginRegister
 *
 * @author Jessie
 */
class LoginRegister extends App {
    //put your code here
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    
    
    //User Info
    public $firstname;
    public $lastname;
    public $company;
    public $street;
    public $city;
    public $zipcode;
    public $state;
    public $country;
    public $telephone;
    public $email;
   
    
    
    
    
    //GET USER INFORMATIONS=====================================================
    function GetUserInfo(){
        $info_arr = array();
        $guserinfo = "SELECT * FROM tbluserinfo WHERE info_userid = '$this->user_id'";
        $rguserinfo = mysqli_query($this->Connect(), $guserinfo);
        if(mysqli_num_rows($rguserinfo)>0){
            while($rrguserinfo  = mysqli_fetch_assoc($rguserinfo)){
                array_push($info_arr, $rrguserinfo);
            }
            echo json_encode($info_arr);
        }else{
            echo json_encode($info_arr);
        }
        
    }

    //UDPATE USER PASSWORD
    function UpdateUserPassword($oldpass){
        
        $chkpassword = "SELECT * FROM tblusers WHERE user_password = '$oldpass'";
        $rchkpassword = mysqli_query($this->Connect(), $chkpassword);
        if(mysqli_num_rows($rchkpassword)>0){
            $uppass = "UPDATE tblusers SET user_password = '$this->user_password'"
                    . "WHERE user_id = '$this->user_id'";
            $ruppass = mysqli_query($this->Connect(), $uppass);
            if($ruppass){
                echo "updated";
            }else{
                echo "error";
            }
        }else{
            echo "notexisted";
        }
        
        
    }
    
    
    //UPDATE USER INFO and CONTACT//========
    function UpdateUserInfo(){
        
        $chkuser = "SELECT * FROM tbluserinfo WHERE info_userid ='$this->user_id'";
        $rchkuser = mysqli_query($this->Connect(), $chkuser);
        if(mysqli_num_rows($rchkuser)>0){
            
            //UDPATE INFO ======================================================
            $updateinfo = "UPDATE tbluserinfo SET info_fname='$this->firstname',"
                    . "info_lname = '$this->lastname',"
                    . "info_company = '$this->company',"
                    . "info_street = '$this->street',"
                    . "info_city = '$this->city',"
                    . "info_zipcode = '$this->zipcode',"
                    . "info_state = '$this->state',"
                    . "info_country ='$this->country',"
                    . "info_telephone = '$this->telephone',"
                    . "info_email = '$this->email'"
                    . "WHERE info_userid = '$this->user_id'";
            $rupdateinfo = mysqli_query($this->Connect(), $updateinfo);
            if($rupdateinfo){
                $upuser = "UPDATE tblusers SET user_email='$this->email'"
                        . "WHERE user_id = '$this->user_id'";
                $rupuser = mysqli_query($this->Connect(), $upuser);
                if($rupuser){
                    echo "updated";
                }
            }
        }else{
            //SAVE USER INFO ===================================================
            $saveinfo = "INSERT INTO tbluserinfo(info_userid, info_fname, info_lname, info_company, info_street,"
                    . "info_city, info_zipcode, info_state, info_country, info_telephone, info_email)"
                    . "VALUES('$this->user_id', '$this->firstname', '$this->lastname', '$this->company', '$this->street',"
                    . "'$this->city', '$this->zipcode', '$this->state', '$this->country', '$this->telephone',"
                    . "'$this->email')";
            $rsaveinfo = mysqli_query($this->Connect(), $saveinfo);
            if($rsaveinfo){
                echo "saved";
            }else{
                echo "error". mysqli_error($this->Connect());
            }
        }
        
       // 
        
    }
    
    //LOGIN USER //============
    function LoginUser(){
        
        $loguser = "SELECT * FROM tblusers WHERE user_email = '$this->user_email' and user_password = '$this->user_password'";
        $rloguser = mysqli_query($this->Connect(), $loguser);
        if(mysqli_num_rows($rloguser)>0){
            session_start();
            $rrloguser = mysqli_fetch_assoc($rloguser);
            $userid = $rrloguser['user_id'];
            $username = $rrloguser['user_name'];
            
            $_SESSION['id'] = $userid;
            $_SESSION['name'] = $username;
            echo "success";
            
        }else{
            echo "failed";
        }
    }
    
    
    //SAVE NEW USER//==========
    function SaveNewUser(){
          
        $chkemail = "SELECT * FROM tblusers WHERE user_email='$this->user_email'";
        $rchkemail = mysqli_query($this->Connect(), $chkemail);
        if(mysqli_num_rows($rchkemail)>0){
            echo "exist";
        }else{
            $saveuser = "INSERT INTO tblusers(user_name, user_email, user_password) "
                    . "VALUES ('$this->user_name', '$this->user_email', '$this->user_password')";
            $rsaveuser = mysqli_query($this->Connect(), $saveuser);
            if($rsaveuser){
                echo "saved";
            }else{
                echo "error: ".mysqli_error($this->Connect());
            }
            
        }
        
    }
    
}//END OF CLASS


//============================POST REQUEST===================================//
$logre = new LoginRegister();


if(isset($_POST['']) && !empty($_POST[''])){
    
    
}

if(isset($_POST['']) && !empty($_POST[''])){
    
    
}

//GET USER INFO
if(isset($_POST['getuserinfo']) && !empty($_POST['getuserinfo'])){
    $userid = filter_input(INPUT_POST, 'userid');
    $logre->user_id = $userid;
    $logre->GetUserInfo();
    mysqli_close($logre->Connect());
}

//UPDATE USER INFP
if(isset($_POST['upuserinfo']) && !empty($_POST['upuserinfo'])){
    
    $userid = filter_input(INPUT_POST, 'userid');
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $company = filter_input(INPUT_POST, 'company');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $zip = filter_input(INPUT_POST, 'zip');
    $state = filter_input(INPUT_POST, 'state');
    $country = filter_input(INPUT_POST, 'country');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    
	
	
	$firstname = mysqli_real_escape_string($logre->Connect(),$firstname);
	$lastname = mysqli_real_escape_string($logre->Connect(),$lastname);
	$company = mysqli_real_escape_string($logre->Connect(),$company);
	$street = mysqli_real_escape_string($logre->Connect(),$street);
	$city = mysqli_real_escape_string($logre->Connect(),$city);
	$zip = mysqli_real_escape_string($logre->Connect(),$zip);
	$state = mysqli_real_escape_string($logre->Connect(),$state);
	$country = mysqli_real_escape_string($logre->Connect(),$country);
	$phone = mysqli_real_escape_string($logre->Connect(),$phone);
	$email = mysqli_real_escape_string($logre->Connect(),$email);
	
	
    $logre->user_id = $userid;
    $logre->firstname = $firstname;
    $logre->lastname = $lastname;
    $logre->company = $company;
    $logre->street = $street;
    $logre->city = $city;
    $logre->zipcode = $zip;
    $logre->state = $state;
    $logre->country = $country;
    $logre->telephone = $phone;
    $logre->email= $email;
    $logre->UpdateUserInfo();
    mysqli_close($logre->Connect());
}

//UPDATE NEW USER PASSWORD
if(isset($_POST['uppassword']) && !empty($_POST['uppassword'])){
    $userid = filter_input(INPUT_POST, 'userid');
    $newpass = filter_input(INPUT_POST, 'newpass');
    $chkpass = filter_input(INPUT_POST, 'chkpass');
	
	
	$chkpass = mysqli_real_escape_string($logre->Connect(),$chkpass);
	$newpass = mysqli_real_escape_string($logre->Connect(),$newpass);
	
    $newpass = $logre->EncPassword($newpass);
    $chkpass = $logre->EncPassword($chkpass);
    
	
    $logre->user_id = $userid;
    $logre->user_password = $newpass;
    $logre->UpdateUserPassword($chkpass);
    mysqli_close($logre->Connect());
}

//LOGIN USER
if(isset($_POST['loguser']) && !empty($_POST['loguser'])){
    
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    $username = mysqli_real_escape_string($logre->Connect(),$username);
    $password = mysqli_real_escape_string($logre->Connect(),$password);
    
    $password = $logre->EncPassword($password);
    
    $logre->user_email = $username;
    $logre->user_password = $password;
    $logre->LoginUser();
    mysqli_close($logre->Connect());
}

//SAVE NEW USER
if(isset($_POST['savenewuser']) && !empty($_POST['savenewuser'])){
    
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    
	$name = mysqli_real_escape_string($logre->Connect(),$name);
	$email = mysqli_real_escape_string($logre->Connect(),$email);
	$password = mysqli_real_escape_string($logre->Connect(),$password);
	
    $password = $logre->EncPassword($password);
   
    $logre->user_name = $name;
    $logre->user_email = $email;
    $logre->user_password = $password;
    $logre->SaveNewUser();
    mysqli_close($logre->Connect());
}



