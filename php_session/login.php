<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP-SESSION</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="">Name</label>
            <input type="text" name="username">

            <label for="">Passwords</label>
            <input type="password" name="password">

            <input type="submit" value="SubmiT" name="btn_login">
        </form>
    </div>
</body>
</html>
<?php 
    session_start();
    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!empty($username) && !empty($password)){
            if($username=='Nann Visal' && $password=='1323'){
                $_SESSION['user']= $username;
                header('location: dashboard.php');
            }else{
                echo 'wrong user name or passwords.';
            }
        }else{
            echo 'All Field Is Not Empty.';
        }
    }
?>

