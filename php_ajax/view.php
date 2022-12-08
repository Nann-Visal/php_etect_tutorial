<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
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

</head>
<body>

    <!-- block body -->
    <div class="container-fluid bg-light float-end">
        <h1 class="p-5">Shoes List </h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
            </tr>

             <!-- call php -->
            <?php 
                
                //call connection
                include('connection.php');
                global $con;

                //query data from database
                $sql = "SELECT * FROM tbl_shoes";
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
                            <img src="images/'.$row['thumbnail'].'" alt="" width="150" height="100">
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
                        <input type="text" name="image_name" id="image_name" class="d-none">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_modal_save" name="btn_modal_save">Save</button>
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
                success     :function(respone){
                    $("#upload_img").attr("src","images/"+respone); //this line describe that ajax get respone from php when php finish task
                    $("#image_name").val(respone);
                }
            });
        });
        
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
               success  :function(respone){         //this line describe that ajax get respone from php when php finish task 
                            alert(respone);
                        }
            });
        });

    });  
</script>
</html>