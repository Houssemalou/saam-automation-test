<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SAMM - AUTOMATION AND TEST</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="container-fluid">
        <div class="bg-secondary rounded h-100 p-4 modify" id="update">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <figure class="figure">
                        <img src="<?php 
                            include 'session.php';
                            include 'photo_url.php';
                        ?>" class="figure-img img-fluid" width="230px" height="230px" style="border-radius: 50%;" alt="...">
                        <figcaption class="figure-caption text-center"><?php 
                                    
                                    if(isset($_SESSION['email'])){
                                        $curentUser=$_SESSION['email'];
                                    }
                                    echo $curentUser;
                                ?></figcaption>
                    </figure>
                    </div>
                    <div class="col-md-6 d-flex  justify-content-center align-items-center">
                        <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SAMM</h3>
                            </a>
                            <h3>Select a photo</h3>
                        </div>
                        <form id="form" action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingInput"  name="image" required>
                                <label for="floatingInput">Select a photo</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Change</button>
                        </form>
                        <p class="text-center mb-0">do you want to back at home page ? <a href="index.php">Click here</a></p>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

        
        <!-- Spinner Start -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="saam.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
