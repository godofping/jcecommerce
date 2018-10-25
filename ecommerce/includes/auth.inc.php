<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once './pages/app.class.php';
$app = new App();
$userid = (isset($_SESSION['id']))? $_SESSION['id'] : '';
$username = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';


