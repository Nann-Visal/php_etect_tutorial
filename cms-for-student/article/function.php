<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
     //connect to database
     $con=new mysqli('','root','','cms_web2');
     session_start();

     //get logo webside
     function get_logo_webside($status){
        global $con;
        $sql = "SELECT * FROM tbl_logo WHERE status='$status' ORDER BY id DESC LIMIT 1";
        $res = $con->query($sql);
        $row=mysqli_fetch_assoc($res);
        echo $row['thumbnail'];
     }
     
?>