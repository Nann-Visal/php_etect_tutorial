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
            </tr>
            <!-- call function from php function -->
            <?php
                    include('function.php');
             ?>
            <tr>
                <td>1</td>
                <td>Nann Visal</td>
                <td>19</td>
                <td>Male</td>
                <td>1000</td>
                <td>
                    <img src="https://th.bing.com/th/id/OIP.z8Vb0_W3Hxj3kkXEDjlTZwHaHa?w=189&h=189&c=7&r=0&o=5&dpr=1.3&pid=1.7" width="90" height="100" style="object-fit:cover" alt="">
                </td>
            </tr>
        </table>

    </div>

    <!-- Modal -->
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

</body>
</html>