<?php 
function redirectToLogin() {
    header('location: ./login/');
}

session_start();

if(!isset($_SESSION['username'])){
   redirectToLogin();
 }
 
?>