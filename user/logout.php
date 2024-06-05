<?php
session_start();
if(isset($_SESSION['u_email'])){
    session_destroy();
    header('location: ../admin/login.php');
}else{
    header('location: ..admin/login.php');
}
?>