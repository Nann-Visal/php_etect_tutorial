<?php

    //call connection that connect from php to database
    include('connection.php');
    global $con;

    //get value of post method from ajax
    $name = $_POST['product_name'];
    $size = $_POST['product_size'];
    $price= $_POST['product_price'];
    $from = $_POST['product_from'];
    $_for  = $_POST['product_for'];
    $img  = $_POST['product_img'];
    
    //if track user input
    if(!empty($name) && !empty($size) && !empty($price) && !empty($from) && !empty($_for) && !empty($img)){
         //insert data to sql
        $sql = "
            INSERT INTO `tbl_shoes`( `name`, `size`, `price`, `from`, `for`, `thumbnail`) 
            VALUES ('$name','$size','$price','$from','$_for','$img')
        ";

        //resspone query sql statement
        $res = $con->query($sql);
        if($res){
            echo'success';
        }
    }
?>