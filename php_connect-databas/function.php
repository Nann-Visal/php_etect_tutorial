<?php 
    $hostname ='';
    $user     ='root';
    $password ='';
    $db       ='db_information_7_8';
    $con      = new mysqli($hostname,$user,$password,$db);

    function insert_data(){
        global $con;
        if(isset($_POST['btn_insert'])){
          $name = $_POST['stu_name'];
          $age = $_POST['stu_age'];
          $gender = $_POST['stu_gender'];
          $course = $_POST['stu_course'];
          $phone =$_POST['stu_phone'];
          if(!empty($name) && !empty($age) && !empty($gender) && !empty($course) && !empty($phone)){
            $sql = "INSERT INTO `tbl_user`(`id`, `name`, `gender`, `age`, `course`, `phone`)
                VALUES (null,'$name','$gender','$age','$course','$phone')";
            $res = $con->query($sql);
            if($res){
                echo 'inserted';
            }else{
                echo "erro";
            }
          }else{
              echo 'no';
          }
        }
    }
    insert_data();
?>
