<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP FORM</title>
</head>
<body>
    <div class="container">
        <form action="" autocomplete="off" method="post">

            <label for="uid">Id</label>
            <input type="text"  id="uid" placeholder="Id" name="uid">

            <label for="uname">Name</label>
            <input type="text" id="uname" placeholder="Name" name="uname">

            <label for="uage">Age</label>
            <input type="text"id="uage" placeholder="Age" name="uage">

            <label for="ugender">Gender</label>
            <select name="ugender" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="uknown">Prefer not to say.</option>
            </select>
            
            <input type="submit" value="save" name="personsubmit">

        </form>
    </div>
</body>
</html>

<?php
    include('function.php');
    if(isset($_POST['personsubmit'])){

        $id     = $_POST['uid'];
        $name   = $_POST['uname'];
        $age    = $_POST['uage'];
        $gender = $_POST['ugender'];

        $obj_person = new Person();

        $obj_person->setValue($id,$name,$age,$gender);
        $obj_person->display();
        
    }
?>