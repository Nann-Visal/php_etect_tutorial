<?php 
    //call connection that connect from php to database
    include('connection.php');
    global $con;
    
    //get value of post method from ajax
 echo    $id       = $_POST['user_id'];
 echo    $name     = $_POST['user_name'];
 echo    $age      = $_POST['user_age'];
 echo    $gender   = $_POST['user_gender'];
 echo    $address  = $_POST['user_address'];
 echo    $salary   = $_POST['user_salary'];
 echo    $img      = $_POST['user_img'];
     
    $sql = "
        UPDATE `tbl_user` 
        SET `name`   ='$name',
           `gender`  ='$gender',
           `age`     ='$age',
           `address` ='$address',
           `salary`  ='$salary',
           `profile` ='$img'
         WHERE 'id'  ='$id'
    ";
    $res = $con->query($sql);
    if($res){
        echo 'success';
    }
?>