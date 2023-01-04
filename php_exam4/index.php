<?php 
    if(!empty($_SESSION['user'])){ 
        header('location:logout.php');
    }
    else{
        header('location:login.php');
    }
?>

         