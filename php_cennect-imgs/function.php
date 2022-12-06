<?php

    // connect php to databse
    $con = new mysqli("","root","","db_information_7_8");
    //function insert data from php to data base
    function insert_data(){
        global $con;
        if(isset($_POST['btn_modal_save'])){
            $name      = $_POST['user_name'];
            $age       = $_POST['user_age'];
            $gender    = $_POST['user_gender'];
            $salary    = $_POST['user_salary'];
            $profile   = $_FILES['user_profile']['name'];
            if(!empty($name) && !empty($age) && !empty($gender) && !empty($salary) && !empty($profile)){
                $profile = date('YmdHis').'-------'.$profile;
                $path = 'images/'.$profile;
                move_uploaded_file($_FILES['user_profile']['tmp_name'],$path);
                $sql_insert = "INSERT INTO `tbl_staff`( `name`, `age`, `gender`, `salary`, `profile`)
                 VALUES ('$name','$age','$gender','$salary','$profile')";
                $res_insert = $con->query($sql_insert);
                if($res_insert){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Success!",
                                    text: "Data has been insert . . . ",
                                    icon: "success",
                                    button: "ok?",
                                });
                            })
                        </script>
                    ';
                }
                else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Error!",
                                    text: "Something went wrong  . . . ",
                                    icon: "error",
                                    button: "Try again",
                                });
                            })
                        </script>
                    ';
                }
            }
            else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "All fields can not empty . . . ",
                            icon: "error",
                            button: "Try again",
                        });
                    })
                </script>
                ';
            }

        }
    }
    //call function
    insert_data();


    //function delete data from data base to php
    function delete_data(){
        global $con;
        if(isset($_POST['btn_modal_delete'])){
            $remove_id = $_POST['remove_id'];
            $sql_delete = "
                UPDATE `tbl_staff` 
                SET isdelete = 1
                WHERE id = '$remove_id';
            ";
            $res_delete = $con->query($sql_delete);
            if($res_delete){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success!",
                                text: "Data has been delete . . . ",
                                icon: "success",
                                button: "ok?",
                            });
                        })
                    </script>
                ';
            }
            else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "Something went wrong  . . . ",
                                icon: "error",
                                button: "Try again",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    //call function
    delete_data();


    //function update data from php to data base
    function update_data(){
        global $con;
        if(isset($_POST['btn_modal_edit'])){
            $id          = $_POST['old_id'];
            $name        = $_POST['user_name'];
            $age         = $_POST['user_age'];
            $gender      = $_POST['user_gender'];
            $salary      = $_POST['user_salary'];
            $profile     = $_FILES['user_profile']['name'];
            $old_profile = $_POST['old_pro'];
            if(empty($profile)){
                $profile = $old_profile;
            }
            else{
                $profile = date('YmdHis').'------'.$profile;
                $path = 'images/'.$profile;
                move_uploaded_file($_FILES['user_profile']['tmp_name'],$path);
            }
            $sql = "
                UPDATE `tbl_staff` 
                SET `name`='$name',`age`='$age',`gender`='$gender',`salary`='$salary',`profile`='$profile'
                WHERE id = '$id';
            ";
            $res = $con->query($sql);
            if($res){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success!",
                                text: "Information has been delete . . . ",
                                icon: "success",
                                button: "ok?",
                            });
                        })
                    </script>
                ';
            }
            else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "Something went wrong  . . . ",
                                icon: "error",
                                button: "Try again",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    //call function
    update_data();


    //function restor data from data base to php
    function restore_data(){
        global $con;
        if(isset($_POST['btn_modal_restore'])){
           $id = $_POST['rs_id'];
           $sql = "
            UPDATE `tbl_staff` 
            SET isdelete = 0
            WHERE id = '$id';
           ";
           $res = $con->query($sql);
            if($res){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Success!",
                                text: "Data has been restoer . . . ",
                                icon: "success",
                                button: "ok?",
                            });
                        })
                    </script>
                ';
            }
            else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "Something went wrong  . . . ",
                                icon: "error",
                                button: "Try again",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    //call function
    restore_data();
?>
