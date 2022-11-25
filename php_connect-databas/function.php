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
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success!",
                                text: "Information has been insert",
                                icon: "success",
                        });
                        })
                    </script>
                ';
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "Something went worng",
                                icon: "error",
                                button: "try again",
                        });
                        })
                    </script>
                ';
            }
          }else{
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "All field must be not empty!",
                            icon: "error",
                            button: "try again",
                    });
                    })
                </script>
            ';
          }
        }
    }
    insert_data();

    function update_data(){
        global $con;
        if(isset($_POST['btn_update'])){
            $id  =  $_POST['stu_id'];
            $name = $_POST['stu_name'];
            $age = $_POST['stu_age'];
            $gender = $_POST['stu_gender'];
            $course = $_POST['stu_course'];
            $phone =$_POST['stu_phone'];
            if(!empty($name) && !empty($age) && !empty($gender) && !empty($course) && !empty($phone)){
               $sql = "
               UPDATE `tbl_user` SET `name`='$name',`gender`='$gender',`age`='$age',`course`='$course',`phone`='$phone' WHERE id = '$id'
               ";
               $res = $con->query($sql);
               if($res){
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Success!",
                            text: "Information has been update",
                            icon: "success",
                    });
                    })
                </script>
            ';
               }else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "Something went worng",
                            icon: "error",
                            button: "try again",
                    });
                    })
                </script>
            ';
               }
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "All field must be not empty!",
                                icon: "error",
                                button: "try again",
                        });
                        })
                    </script>
                ';
              }
            }
        }
    update_data();

    function delete_data(){
        global $con;
        if(isset($_POST['btn_delete'])){
            $id = $_POST['id_delete'];
            $sql = "DELETE FROM `tbl_user` WHERE id ='$id'";
            $res=$con->query($sql);
            if($res){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success!",
                                text: "Information has been deleted",
                                icon: "success",
                        });
                        })
                    </script>
                ';
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "Something went worng",
                                icon: "error",
                                button: "try again",
                        });
                        })
                    </script>
                ';
            }
        }
    }
    delete_data();
?>