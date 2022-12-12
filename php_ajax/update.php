<?php 
    //call connection that connect from php to database
    include('connection.php');
    global $con;
    
    $id      =   $_POST['edit_id'];
    $name    =   $_POST['edit_name'];
    $size    =   $_POST['edit_size'];
    $price   =   $_POST['edit_price'];
    $from    =   $_POST['edit_from'];
    $_for    =   $_POST['edit_for'];
    $thumbnail = $_POST['product_img'];
     
    $sql = "
        UPDATE `tbl_shoes`
        SET `name`='$name',`size`='$size',`price`='$price',`from`='$from',`for`='$_for',`thumbnail`='$thumbnail'
        WHERE id = '$id'
    ";
    $res = $con->query($sql);
    if($res){
        echo 'success';
    }
?>