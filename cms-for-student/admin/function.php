

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php
    //connect to database
    $con=new mysqli('','root','','cms_web2');
    session_start();

    //register admin
    function register(){

        global $con;

        if(isset($_POST['btn_register'])){

            $name      =   $_POST['username'];
            $password  =   $_POST['userpassword'];
            $email     =   $_POST['useremail'];
            $profile   =   $_FILES['userprofile']['name'];
        }

        //check user input
        if(!empty($name) && !empty($password) && !empty($email) && !empty($profile)){

            $password = md5($password);
            $profile  = date('YmDHis').'------'.$profile;
            $path     = 'assets/icon/'.$profile;
            move_uploaded_file($_FILES['userprofile']['tmp_name'],$path);

            $sql = "
                INSERT INTO `tbl_user`(`username`, `email`, `profile`, `password`)
                VALUES ('$name','$email','$profile','$password')
            ";
            $res = $con->query($sql);

            if($res){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Has been register . . .",
                                text: "Sucessfull to register . . .",
                                icon: "success",
                                button: "Next . . .",
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
                                title: "Has been not register . . .",
                                text: "All fields must be not empty . . . !",
                                icon: "error",
                                button: "Try again!",
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
                            title: "Can not register",
                            text: "Something went twrong!",
                            icon: "error",
                            button: "Try again!",
                        });
                    })
                </script>
            ';
        }
    }
    //call function
    register();

    //login
    function login(){
        global $con;

        if(isset($_POST['btn_login'])){

           $name_email =  $_POST['name_email'];
           $password   =  md5($_POST['password']);

           $sql = "
                 SELECT id FROM `tbl_user`
                 WHERE (`username` = '$name_email' OR `email`='$name_email') AND (`password`='$password')
           ";
           $res=$con->query($sql);
           $row = mysqli_fetch_assoc($res);
           if(!empty($row)){
               $_SESSION['user']=$row['id'];
              header('location:index.php');
           }
           else{
               echo 'error';
           }
        }
    }
    //call function
    login();

    //logout function
    function logout(){
        if(isset($_POST['accept_logout'])){
            unset($_SESSION['user']);
            header('location:login.php');
        }
    }
    //call function
    logout();

    //add post function
    function logo_add_post(){
        global $con;
        if(isset($_POST['btn_add_logo'])){

            $show_on    =   $_POST["show_on_addpost"];
            $thumbnail  =   $_FILES["thumbnail_addpost"]["name"];
           
            if(!empty($show_on) && !empty($thumbnail)){
                $thumbnail = date('YmdHis').'----'.$thumbnail;
                $path = 'assets/icon/'.$thumbnail;
                move_uploaded_file($_FILES["thumbnail_addpost"]["tmp_name"],$path);
                $sql = "
                    INSERT INTO `tbl_logo`(`thumbnail`, `status`)
                    VALUES ('$thumbnail','$show_on')
                ";
                $res = $con->query($sql);
                if($res){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Has been adding . . .",
                                    icon: "success",
                                    button: "Okay",
                                });
                            })
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Has been dose not adding . . .",
                                    text: "Something went wrong . . . !",
                                    icon: "error",
                                    button: "Try again!",
                                });
                            })
                        </script>
                    ';
                }
            }
        }
    }
    //call function
    logo_add_post();

    //logo view
    function logo_view_post(){

        global $con;
        $sql = "SELECT * FROM tbl_logo ORDER BY id DESC LIMIT 5";
        $res = $con->query($sql);
        while( $row=mysqli_fetch_assoc($res)){
            $id         = $row['id'];
            $thumbnail  = $row['thumbnail'];
            $show_on    = $row['status'];
            echo '
                <tr>
                    <td>'.$id.'</td>
                    <td>
                        <img width="120" height="120" src="assets/icon/'.$thumbnail.'"alt="">
                    </td>
                    <td>'.$show_on.'</td>
                    <td>
                        <a href="logo_update_post.php?id='.$id.'" class="btn btn-warning">Update</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            ';
        }
    }

    //update logo
    function logo_update_post(){
        global $con;
        if(isset($_POST['btn_update_logo'])){
            $show_on    = $_POST['show_on_updatepost'];
            $thumbnail  = $_FILES['thumbnail_updatepost']['name'];
            $old_thumbnail = $_POST['old_thumbnail'];
            $update_post_id = $_GET['id'];
            if(!empty($thumbnail)){
                $thumbnail = date('YmdHis').'----'.$thumbnail;
                $path = 'assets/icon/'.$thumbnail;
                move_uploaded_file($_FILES["thumbnail_addpost"]["tmp_name"],$path);
            }
            else{
                $thumbnail = $old_thumbnail;
            }

            $sql = "
                UPDATE `tbl_logo` SET `thumbnail`='$thumbnail',`status`='$show_on'
                WHERE id = '$update_post_id'
            ";
            $res = $con->query($sql);
            
        }
    }
    //call function
    logo_update_post();
?>
