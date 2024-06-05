<?php

if(isset($_COOKIE['email'])){
    header('location: index.php');
} else {
    header('location: login.php');

}
?>
