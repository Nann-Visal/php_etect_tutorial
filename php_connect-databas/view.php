<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid bg-dark">
        <h1 class="text-light m-0">PHP CRUD</h1>
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
            Add <i class="fa-sharp fa-solid fa-plus"></i>
        </button>
    </div>
        <table class="table table-dark table-hover" style="table-layout:fixed">
           <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Phone</th>
           </tr>
           <?php 
                include('function.php');

                $sql = "SELECT * FROM tbl_user ORDER BY id DESC";
                $res = $con->query($sql);

                while($row=mysqli_fetch_assoc($res)){
                    echo'
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['age'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['course'].'</td>
                            <td>'.$row['phone'].'</td>
                        </tr>
                    '; 
                }
           ?>
        </table>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Student Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group mb-4">
                            <label for="">Name</label>
                            <input type="text" name="stu_name" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Age</label>
                            <input type="text" name="stu_age" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Gender</label>
                            <select name="stu_gender" class="form-select" id="">
                                <option value="male">Male</option>
                                <option value="femal">Femal</option>
                                <option value="unknow">Unknow</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Course</label>
                            <input type="text" name="stu_course" id="" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Phone</label>
                            <input type="text" name="stu_phone" id="" class="form-control">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="btn_insert">Save</button>
                        </div>
                    </form>
            </div>
        </div>
</body>
</html>