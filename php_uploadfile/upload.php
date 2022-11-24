<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
</head>
<body>
    <form method="post">
        Images : <input type="file" name='image'> <br>
        <br><br>
        <input type="submit" value="upload" name="uploadimg">
    </form>
</body>
</html>
 
<?php 
    if(isset($_POST['uploadimg'])){
        $img = rand(1,999).'-'.$_FILES['image']['name'];
        $path = 'images/'.$img;
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
    }
?>