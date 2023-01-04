<!DOCTYPE html>
<html lang="en">
<!-- include php function -->
<?php 
    include ('function.php');
?>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"></script>
    <title>REGISTER</title>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                    <form class="mx-1 mx-md-4 " method="post" enctype="multipart/form-data">

                        <div class="d-flex flex-row align-items-center mb-4">
            
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="user_name" name="username" class="form-control" autocomplete="off" />
                                <label class="form-label" for="">Your Name</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="email" id="user_email" name="useremail" class="form-control"autocomplete="off" />
                                <label class="form-label" for="">Your Email</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            
                            <div class="form-outline flex-fill mb-0">
                            <input type="password" id="user_password" name="userpassword" class="form-control" autocomplete="off" />
                            <label class="form-label" for="">Password</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            
                            <div class="form-outline flex-fill mb-0">
                            <input type="file" id="user_profile" name="userprofile" class="form-control" />
                            </div>
                        </div>
                        

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <a href="login.php" class="btn">Back To Login</a>&ensp;
                            <button id="btn_register"  name="btnregister" type="button" class="btn btn-primary btn-lg">Register</button>
                        </div>

                    </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="images/logo_page.png"
                    class="img-fluid" alt="Sample image">

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>