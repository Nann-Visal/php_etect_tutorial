<?php

    //call connection that connect from php to database
    include('connection.php');
    global $con;

    //get value of post method from ajax
  echo  $name     = $_POST['user_name'];
  echo  $age      = $_POST['user_age'];
  echo  $gender   = $_POST['user_gender'];
  echo  $address  = $_POST['user_address'];
  echo  $salary   = $_POST['user_salary'];
  echo  $img      = $_POST['user_img'];
    
    //if track user input
    if(!empty($name) && !empty($age) && !empty($gender) && !empty($address) && !empty($salary) && !empty($img)){
         //insert data to sql
        $sql = "
                INSERT INTO `tbl_user`( `name`, `gender`, `age`, `address`, `salary`, `profile`)
             VALUES ('$name','$gender','$age','$address','$salary','$img')
        ";

        //resspone query sql statement
        $res = $con->query($sql);
        if($res){
            echo'success';
        }
    }
?>