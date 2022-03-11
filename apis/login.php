<?php 
//test
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/dss-capex-qe/databases/Db.php");
require_once($_SERVER['DOCUMENT_ROOT']."/dss-capex-qe/controllers/AuthController.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $auth_controller = new AuthController($conn);
    $user = $auth_controller->login($username, $password);
    if(isset($user)){
        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['witel'] = $user['witel'];
        $_SESSION['role'] = $user['role'];
        $ip = $_SERVER['REMOTE_ADDR'];
  
        header("location: ../pages/dashboard/index.php");
    }else{
        header("location: ../pages/login.php");
    }
}
?>