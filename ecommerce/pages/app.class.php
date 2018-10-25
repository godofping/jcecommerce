<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app
 *
 * @author Jessie
 */
class App {
    //put your code here
    
    //ONLINE
   /* public $hostname = "fdb22.atspace.me";
    public $username = "2854559_ecommerce";
    public $password = "*ecommerce1234!";
    public $database = "2854559_ecommerce";*/
    
    //LOCAL
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "dbecommerce";
    
    
    //CONNECT TO DATABASE
    function Connect(){
        
        $con = new MySQLi($this->hostname, $this->username, $this->password, $this->database);
        if(!$con){
            return mysqli_error($con);
        }else{
            return $con;
        }
    }
    
    
    //ENCRYPT PASSWORD
    function EncPassword($password){
        $mySalt = "king!";
        $pass = md5($mySalt.$password);
        return $pass;
    }
    
    
    
}
