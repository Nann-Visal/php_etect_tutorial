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

    <title>CRUD Image</title>
</head>
<body>
    <!-- @body web page -->
    <div class="container-fluid bg-dark float-end">
        <h1 class="text-light p-5 ">PHP TRASH IMAGES</h1>
        <table class="table table-dark table-hover align-middle" style="table-layout:fixed">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>SALARY</th>
                <th>PROFILE</th>
                <th>ACTION</th>
            </tr>
            <?php
                include('function.php');
                $sql = "SELECT * FROM tbl_staff WHERE isdelete = 1 ORDER BY id DESC LIMIT 5";
                $res = $con->query($sql);
                while($row = mysqli_fetch_assoc($res)){
                    echo'
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['age'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['salary'].'</td>
                            <td>
                                <img src="images/'.$row['profile'].'" alt="'.$row['profile'].'" width="100" style="object-fit:cover" height="100" alt="">
                            </td>
                            <td>
                                <!-- Button to Open the Modal -->
                                <button id="openRestore" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Restore
                                    <i class="fa-regular fa-nfc-trash"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </table>
    </div>
        <!-- The delete Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Are you want to restore this staff?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <form action="" method="post">
                        <input type="hidden" name="rs_id" id="rs_id">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="btn_modal_restore">Yes . . .</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $("body").on("click","#openRestore",function(){
            var re_id = $(this).parents("tr").find('td').eq(0).text();
            $("#rs_id").val(re_id);
        });
    })
</script>
</html>