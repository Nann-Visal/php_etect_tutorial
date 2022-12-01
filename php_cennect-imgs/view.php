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
        <h1 class="text-light p-5 ">PHP CRUD IMAGES</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-user-plus"></i>
        </button>
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
            <!-- call function from php function -->
            <?php
                    include('function.php');
                    //query data from databse by myql script
                    $sql = "SELECT * FROM tbl_staff ORDER BY id DESC ";
                    $res = $con->query($sql);
                    while($row=mysqli_fetch_assoc($res)){
                        echo '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['age'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['salary'].'</td>
                                <td>
                                    <img src="images/'.$row['profile'].'" width="90" height="100" style="object-fit:cover" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-warning">Edit<i class="fa-solid fa-pen-to-square"></i></button>
                                    <button id="id_delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" >Delete<i class="fa-solid fa-trash-can-slash"></i></button>
                                </td>
                            </tr>
                        ';
                    }
             ?>
        </table>
    </div>

    <!-- AddModal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="mb-1">Name</label>
                            <input type="text" name="username" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">Age</label>
                            <input type="text" name="age" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">Gender</label>
                        <select name="gender" id="" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unknow">Unknow</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">Salary</label>
                            <input type="text" name="salary" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">Profile</label>
                            <input type="file" name="profile" id="" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btn_save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DeleteModal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you really want to delete this staff?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="" method="post">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="id_delete" id="hidden_id_delete">
                    <button type="submit" name="btn_modal_delete" class="btn btn-success" data-bs-dismiss="modal">Yes, Delete</button>
                </form>
            </div>

            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $("body").on("click","#id_delete",function(){
            var delete_id = $(this).parents("tr").find("td").eq(0).text();
            $("#hidden_id_delete").val(delete_id);
        })
    })
</script>
</html>