

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
        
    }
    //call function
    logo_add_post();
?>
