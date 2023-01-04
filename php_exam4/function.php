<?php 

    //connect to database
    $con=new mysqli('','root','','php_exam');
    session_start();

    //register admin
    function register(){

        global $con;

        if(isset($_POST['btnregister'])){

            $name      =   $_POST['username'];
            $email     =   $_POST['useremail'];
            $password  =   $_POST['userpassword'];
            $profile   =   $_FILES['userprofile']['name'];

            //check user input
        if(!empty($name) && !empty($password) && !empty($email) && !empty($profile)){

            $password = md5($password);
            $profile  = date('YmDHis').'------'.$profile;
            $path     = 'images/'.$profile;
            move_uploaded_file($_FILES['userprofile']['tmp_name'],$path);

            $sql = "
                INSERT INTO `tbl_users`( `name`, `email`, `password`, `profile`) 
                VALUES ('$name','$email','$password','$profile')
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
        }
        
    }
    //call function
    register();

    //login
    function login(){
        global $con;

        if(isset($_POST['btn_login'])){

           $email =  $_POST['user_meail'];
           $password   =  md5($_POST['user_password']);

           $sql = "
                 SELECT id FROM `tbl_users`
                 WHERE (`email`='$email') AND (`password`='$password')
           ";
           $res=$con->query($sql);
           $row = mysqli_fetch_assoc($res);
           if(!empty($row)){
               $_SESSION['user']=$row['id'];
              header('location: index.php');
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
        if(isset($_POST['btn_logout'])){
            unset($_SESSION['user']);
            header('location:login.php');
        }
    }
    //call function
    logout();

?>