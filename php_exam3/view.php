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

    <title>CRUD AJAX</title>
</head>
<body>
    <!-- @body web page -->
    <div class="container-fluid bg-dark float-end">
        <h1 class="text-light p-5 ">PHP CRUD AJAX</h1>
         <!-- Button trigger modal -->
        <button id="openAdd" type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add User . . . <i class="fa-regular fa-grid-2-plus"></i>
        </button>
        <table class="table table-dark table-hover align-middle" style="table-layout:fixed">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>Address</th>
                <th>GENDER</th>
                <th>SALARY</th>
                <th>PROFILE</th>
                <th>ACTION</th>
            </tr>
            <?php
                include('connection.php');
                global $con;
                $sql = "SELECT * FROM tbl_user ORDER BY id DESC";
                $res = $con->query($sql);
                while($row = mysqli_fetch_assoc($res)){
                    echo'
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['age'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['salary'].'</td>
                            <td>
                                <img src="images/'.$row['profile'].'" alt="'.$row['profile'].'" width="150" height="100">
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
                            <label for="">Address</label>
                            <input id="id_useraddress" type="text" class="form-control" name="user_address" >
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
                        <div class="form-group mb-3">
                            <label for="" class="d-block">Profile : </label> 
                            <img   id="upload_img" src="images/OIP_k.jpg" width="100" alt=""> <!-- d-none == hidden -->
                            <input type="file" name="user_profile" id="id_userprofile" class="form-control d-none">
                            <input type="text" name="image_name" id="image_name" class="d-none" >
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"id="id_modal_close" data-bs-dismiss="modal">Close</button>
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
                    <h4 class="modal-title">Are you want to delete this user?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <form action="" method="post">
                        <input type="hidden" name="remove_id" id="rm_id">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" id="btn_modal_delete" name="btn_modal_delete">Yes,Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){

        //if click on image 
        $("#upload_img").click(function(){
            //open input file
            $("#id_userprofile").click();
        });
        
        //if user upload img => input file change
        $("#id_userprofile").change(function(){

            // store image as tmp file when user upload
            var form_data = new FormData();
            var file      = $("#id_userprofile")[0].files;
            form_data.append('user_profile',file[0]);

            //use ajax for dosen't refresh when page uploas file
            $.ajax({
                url         :"save_images.php", // assign task to php implement
                method      :"POST",
                data        :form_data,      //data assign as form
                cache       :false,
                contentType :false,
                processData :false,
                success     :function(response){
                    $("#upload_img").attr("src","images/"+response); //this line describe that ajax get respone from php when php finish task
                    $("#image_name").val(response);
                }
            });
        });

        //if user click on btn_add
        $('body').on('click','#openAdd',function(){
            $("#id_modal_edit").hide();
            $("#id_modal_save").show();
        })

        //if user click on save in modal
        $("#id_modal_save").click(function(){

        //block variable use to store data from form in modal when user click save btn
        var name        =   $("#id_username").val();
        var age         =   $("#id_userage").val();
        var gender      =   $("#id_usergender").val();
        var address     =   $("#id_useraddress").val();
        var salary      =   $("#id_usersalary").val();
        var img         =   $("#image_name").val();

        //use ajax to get data from variable above and assign its to php 
        $.ajax({
            url     :   "insert.php",           // assign task to php implement
            method  :   "POST",
            data    :   {                      //data assign as a key value
                        user_name   : name,
                        user_age    : age,
                        user_gender : gender,
                        user_address: address,
                        user_salary : salary,
                        user_img    : img
                    },
        cache    :   false,
        success  :function(response){         //this line describe that ajax get respone from php when php finish task 
                        if(response == "success"){
                            swal({
                                title: "Success!",
                                text: "Information has been insert",
                                icon: "success",
                            });
                            $("#exampleModal").click();
                        }
                    }
             });
        });

        //if user click on delete
        $("body").on("click","#openDelete",function(){
            var remove_id = $(this).parents("tr").find("td").eq(0).text();

            $("#btn_modal_delete").click(function(){
                $.ajax({
                    url     : 'delete.php',
                    method  : "POST",
                    cache   :false,
                    data    :{
                        id : remove_id
                    },
                    success :function(response){
                        if(response){
                            if(response == 'success'){
                                swal({
                                    title: "Success!",
                                    text: "Information has been insert",
                                    icon: "success",
                                });
                                $("#close_btn_modal").click();
                            }
                        }
                    }
                 });
            });
        });

        //if user click on edit
        $('body').on('click','#openEdit',function(){

            $("#id_modal_edit").show();
            $("#id_modal_save").hide();

            var id      = $(this).parents('tr').find('td').eq(0).text();
            var name    = $(this).parents('tr').find('td').eq(1).text();
            var age     = $(this).parents('tr').find('td').eq(2).text();
            var address = $(this).parents('tr').find('td').eq(3).text();
            var gender  = $(this).parents('tr').find('td').eq(4).text();
            var salary  = $(this).parents('tr').find('td').eq(5).text();
            var img     = $(this).parents('tr').find("td:eq(6) img").attr("alt");

            $("#id_username").val(name);
            $("#id_userage").val(age);
            $("#id_useraddress").val(address);
            $("#id_usergender").val(gender);
            $("#id_usersalary").val(salary);
            $("#upload_img").attr('src','images/'+img);
            $("#image_name").val(img);
            //if user click in edit
            $("#id_modal_edit").click(function(){
                id        = id;
                name        =   $("#id_username").val();
                age         =   $("#id_userage").val();
                gender      =   $("#id_usergender").val();
                address     =   $("#id_useraddress").val();
                salary      =   $("#id_usersalary").val();
                img         =   $("#image_name").val();
                $.ajax({
                    url     :   "update.php",           // assign task to php implement
                    method  :   "POST",
                    data    :   {    
                        user_id     : id,
                        user_name   : name,
                        user_age    : age,
                        user_gender : gender,
                        user_address: address,
                        user_salary : salary,
                        user_img    : img
                            },
                    cache    :   false,
                    success  : function(response){
                        if(response){
                            if(response == 'success'){
                                swal({
                                    title: "Success!",
                                    text: "Information has been edit",
                                    icon: "success",
                                });
                                $("#id_modal_close").click();
                            }
                        }
                    }
                })
            })
        })
    })
</script>
</html>