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
        <button id="openAdd" type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Staff . . . <i class="fa-regular fa-grid-2-plus"></i>
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
            <?php
                include('function.php');
                $sql = "SELECT * FROM tbl_staff WHERE isdelete = 0 ORDER BY id DESC";
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
                                <button id="openEdit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit
                                    <i class="fa-solid fa-rectangles-mixed"></i>
                                </button>
                                <!-- Button to Open the Modal -->
                                <button id="openDelete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Delete
                                    <i class="fa-regular fa-nfc-trash"></i>
                                </button>
                            </td>
                        </tr>
                    ';
                }
            ?>
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
                            <label for="">Name</label>
                            <input id="id_username" type="text"  class="form-control" name="user_name" >
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input id="id_userage" type="text" class="form-control" name="user_age" >
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select id="id_usergender" class="form-select" name="user_gender" >
                                <option value="male">Malse</option>
                                <option value="femalse">Femalse</option>
                                <option value="unknow">Unknow</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input id="id_usersalary" type="text" class="form-control" name="user_salary" >
                        </div>
                        <div class="form-group">
                            <label for="">Profile</label>
                            <input id="id_userprofile" type="file" class="form-control" name="user_profile" >
                        </div>  
                        <!-- oldprofile and id -->
                        <input type="hidden" id="old_profile" name="old_pro">
                        <input type="hidden" id="old_id" name="old_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="id_modal_save" name="btn_modal_save">Save</button>
                            <button type="submit" class="btn btn-primary" id="id_modal_edit" name="btn_modal_edit">Save Edit</button>
                        </div>     
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- The delete Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Are you want to delete this staff?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <form action="" method="post">
                        <input type="hidden" name="remove_id" id="rm_id">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="btn_modal_delete">Yes,Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $("body").on("click","#openDelete",function(){
            var remove_id = $(this).parents("tr").find("td").eq(0).text();
            $("#rm_id").val(remove_id);
        });
        $("#openAdd").click(function(){
            $("#id_modal_save").show();
            $("#id_modal_edit").hide();
        });
        $("body").on("click","#openEdit",function(){
            $("#id_modal_save").hide();
            $("#id_modal_edit").show();
      
            var id       = $(this).parents("tr").find("td").eq(0).text();
            var name     = $(this).parents("tr").find("td").eq(1).text();
            var age      = $(this).parents("tr").find("td").eq(2).text();
            var gender   = $(this).parents("tr").find("td").eq(3).text();
            var salary   = $(this).parents("tr").find("td").eq(4).text();
            var profile  = $(this).parents("tr").find("td:eq(5) img").attr("alt");

            $("#old_id").val(id);
            $("#id_username").val(name);
            $("#id_userage").val(age);
            if(gender=='male'){
                $("#id_usergender").find("option").eq(2).removeAttr("selected","selected");
                $("#id_usergender").find("option").eq(1).removeAttr("selected","selected");
                $("#id_usergender").find("option").eq(0).attr("selected","selected");
            }else if(gender=='unknow'){
                $("#id_usergender").find("option").eq(0).removeAttr("selected","selected");
                $("#id_usergender").find("option").eq(1).removeAttr("selected","selected");
                $("#id_usergender").find("option").eq(2).attr("selected","selected");
            }else{
                $("#id_usergender").find("option").eq(2).removeAttr("selected","selected");
                $("#id_usergender").find("option").eq(0).removeAttr("selected","selected");
                $("#id_usergender").find("option").eq(1).attr("selected","selected");
            }
            $("#id_usersalary").val(salary);
            $("#old_profile").val(profile);
        });

    })
</script>
</html>