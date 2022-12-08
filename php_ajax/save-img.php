<?php
    $thumbnail = date('YmdHis').'----'.$_FILES['product_thumbnail']['name'];
    $path = 'images/'.$thumbnail;
    move_uploaded_file($_FILES['product_thumbnail']['tmp_name'],$path);
    echo $thumbnail;
?>