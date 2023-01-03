<?php
    $profile = date('YmdHis').'----'.$_FILES['user_profile']['name'];
    $path = 'images/'.$profile;
    move_uploaded_file($_FILES['user_profile']['tmp_name'],$path);
    echo $profile;
?>