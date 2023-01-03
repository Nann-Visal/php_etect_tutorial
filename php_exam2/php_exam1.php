<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- @boostrap  css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- @boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- @fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- @jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- @sweetralert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>PHP Exam 2</title>

</head>
<body>

    <!-- block body -->
    <div class="container-fluid bg-light float-end">
        <!-- table show product info -->
        <table class="table table-dark table-hover align-middle" style="table-layout:fixed">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>

             <!-- call php -->
            <?php 
                //conection 
                $con = new mysqli('','root','','php_exam');
                global $con;

                //query data from database
                $sql = "SELECT * FROM tbl_student ORDER BY id DESC";
                $res = $con->query($sql);
                while($row = mysqli_fetch_assoc($res)){
                    echo '
                    <tr>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                    </tr>
                    ';
                }
            ?>
        </table>
    </div>
                  
   
</body>
</html>