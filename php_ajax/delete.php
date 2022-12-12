<?php
   //call connection that connect from php to database
    include('connection.php');
    global $con;

    $remove_id = $_POST['id'];
    if(!empty($remove_id)){
        $sql = "DELETE FROM `tbl_shoes` WHERE id ='$remove_id'";
        $res = $con->query($sql);
        if($res){
            echo 'success';
        }
    }
?>