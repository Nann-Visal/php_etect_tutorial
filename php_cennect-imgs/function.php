<?php

    // connect php to databse
    $con = new mysqli("","root","","db_information_7_8");
    
    //function insert data from php to data base
    function insert_data(){
        global $con;

        //chekc user click on btn_save in html
        if(isset($_POST['btn_save'])){
            $name    = $_POST['username'];
            $age     = $_POST['age'];
            $gender  = $_POST['gender'];
            $salary  = $_POST['salary'];
            $profiel = $_FILES['profile']['name'];

            //check user input in modal from html 
            if(!empty($name) && !empty($age) && !empty($gender) && !empty($salary) && !empty($profiel)){

                //format name of images
                $profiel = date('YmdHis').'-'.$profiel;
                //get images to my foleder image in directory
                $path = 'images/'.$profiel;
                move_uploaded_file($_FILES['profile']['tmp_name'],$path);
                //sent data to sql server
                $sql = "
                    INSERT INTO `tbl_staff`( `name`, `age`, `gender`, `salary`, `profile`) 
                    VALUES ('$name','$age','$gender','$salary','$profiel')
                ";
                $res = $con->query($sql);
                if($res){
                    echo '
                        <script>
                            $(document).ready(function(){
                                            swal({
                                                title: "Success!",
                                                text: "Data has been insert",
                                                icon: "success",
                                                button: "thank you!",
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
                                                text: "Something went wrong!",
                                                icon: "error",
                                                button: "try again!",
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
                                            title: "Error !",
                                            text: "All fields must be not empty!",
                                            icon: "error",
                                            button: "try again",
                                        });
                                    })
                    </script>
                ';
            }
        }
    }
    //call function insert_data
    insert_data();
?>