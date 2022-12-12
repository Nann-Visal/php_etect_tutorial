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


    <title>AJAX</title>

</head>
<body>

    <!-- block body -->
    <div class="container-fluid bg-light float-end">
        <h1 class="p-5">Shoes List </h1>

        <!-- Button trigger modal -->
        <button id="btn_add" type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add . . . <i class="fa-solid fa-plus"></i>
        </button>

        <!-- table show product info -->
        <table class="table table-dark table-hover align-middle" style="table-layout:fixed">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>From</th>
                <th>For</th>
                <th>Product</th>
                <th>Action</th>
            </tr>

             <!-- call php -->
            <?php 
                
                //call connection
                include('connection.php');
                global $con;

                //query data from database
                $sql = "SELECT * FROM tbl_shoes ORDER BY id DESC";
                $res = $con->query($sql);
                while($row = mysqli_fetch_assoc($res)){
                    echo '
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['size'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['from'].'</td>
                        <td>'.$row['for'].'</td>
                        <td>
                            <img src="images/'.$row['thumbnail'].'" alt="'.$row['thumbnail'].'" width="150" height="100">
                        </td>
                        <td>
                            <button id="btn_edit" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Edit . . .
                            </button>
                            <!-- Button modal delete -->
                            <button id="btn_delete" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Delete . . .
                            </button>
                        
                        </td> 
                    </tr>
                    ';
                }
            ?>
        </table>
    </div>
                  
    <!-- Block Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Size</label>
                        <input type="text" name="product_size" id="product_size" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Price</label>
                        <input type="text" name="product_price" id="product_price" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">From</label>
                        <input type="text" name="product_from" id="product_from" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">For</label>                               
                        <input type="text" name="product_for" id="product_for" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="d-block">Thumbnail : </label> 
                        <img   id="upload_img" src="images/OIP_k.jpg" width="100" alt=""> <!-- d-none == hidden -->
                        <input type="file" name="product_thumbnail" id="product_thumbnail" class="form-control d-none">
                        <input type="text" name="image_name" id="image_name" class="d-none" >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn_modal_close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_modal_save" name="btn_modal_save">Save</button>
                <button type="button" class="btn btn-primary" id="btn_modal_edit" name="btn_modal_edit">Edit</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Are you want to delete this product?</h5>
                <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button id="close_btn_modal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btn_modal_delete" type="button" class="btn btn-success">Yes . . .</button>
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
            $("#product_thumbnail").click();
        });
        
        //if user upload img => input file change
        $("#product_thumbnail").change(function(){

            // store image as tmp file when user upload
            var form_data = new FormData();
            var file      = $("#product_thumbnail")[0].files;
            form_data.append('product_thumbnail',file[0]);

            //use ajax for dosen't refresh when page uploas file
            $.ajax({
                url         :"save-img.php", // assign task to php implement
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
        $('body').on('click','#btn_add',function(){
            $("#btn_modal_edit").hide();
            $("#btn_modal_save").show();
        })

        //if user click save in modal, we use ajax to implement this task
        $("#btn_modal_save").click(function(){

            //block variable use to store data from form in modal when user click save btn
            var name        =   $("#product_name").val();
            var size        =   $("#product_size").val();
            var price       =   $("#product_price").val();
            var from        =   $("#product_from").val();
            var _for        =   $("#product_for").val();
            var img         =   $("#image_name").val();

            //use ajax to get data from variable above and assign its to php 
            $.ajax({
                url     :   "insert.php",           // assign task to php implement
                method  :   "POST",
                data    :   {                       //data assign as a key value
                            product_name : name,
                            product_size : size,
                            product_price: price,
                            product_from : from,
                            product_for  : _for,
                            product_img  : img,
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
        $("body").on("click","#btn_delete",function(){
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
        $('body').on('click','#btn_edit',function(){
            $("#btn_modal_save").hide();
            $("#btn_modal_edit").show();

            var id    = $(this).parents('tr').find('td').eq(0).text();
            var name  = $(this).parents('tr').find('td').eq(1).text();
            var size  = $(this).parents('tr').find('td').eq(2).text();
            var price = $(this).parents('tr').find('td').eq(3).text();
            var from  = $(this).parents('tr').find('td').eq(4).text();
            var _for  = $(this).parents('tr').find('td').eq(5).text();
            var thumdnail  = $(this).parents('tr').find("td:eq(6) img").attr("alt");

            $("#product_id").val(id)
            $("#product_name").val(name);
            $("#product_size").val(size);
            $("#product_price").val(price);
            $("#product_from").val(from);
            $("#product_for").val(_for);
            $("#upload_img").attr('src','images/'+thumdnail);
            $("#image_name").val(thumdnail);
            //if user click in edit
            $("#btn_modal_edit").click(function(){
                id        = id;
                name      = $("#product_name").val();
                size      = $("#product_size").val();
                price     = $("#product_price").val();
                from      = $("#product_from").val();
                _for      = $("#product_for").val();
                thumdnail =  $("#image_name").val();
                
                $.ajax({
                    url     :   "update.php",           // assign task to php implement
                    method  :   "POST",
                    data    :   {    
                                edit_id   :id,          //data assign as a key value
                                edit_name : name,
                                edit_size : size,
                                edit_price: price,
                                edit_from : from,
                                edit_for  : _for,
                                product_img  : thumdnail,
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
                                $("#btn_modal_close").click();
                            }
                        }
                    }
                })
            })
        })
    });  
</script>
</html>