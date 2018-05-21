<?php 
function redirectToPosts() {
    header('location: ../');
}

session_start();

if(isset($_SESSION['username'])){
   redirectToPosts();
 }
 
?>