<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Name</label><br>
        <input type="text" name="username"><br>

        <label for="">Age</label><br>
        <input type="text" name="age"><br>

        <label for="">Gender</label><br>
        <select name="gender" id="">
            <option value="male">Male</option>
            <option value="female">FeMale</option>
        </select><br>
        <input type="submit" name="btn_save" value="save">
    </form>
</body>
</html>

<?php
    if(isset($_POST['btn_save'])){
        echo $username = $_POST['username'];
        echo $age = $_POST['age'];
        echo $gender = $_POST['gender'];
    }
?>