<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
    <link href="css/admin_user.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SAAM</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php
                           include 'session.php';
                           include 'photo_url.php';
                                
                        ?>"
                            alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0" style="font-size:8px"></h6>
                                <?php 
                                    
                                    if(isset($_SESSION['email'])){
                                        $curentUser=$_SESSION['email'];
                                    }
                                    echo $curentUser;
                                ?>
                        </h6>
                        <span>software developer</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Home</a>
                    <a href="#showTickets" class="nav-item nav-link"><i class="fas fa-eye me-2"></i>Show tickets</a>
                    <a href="#friends" class="nav-item nav-link"><i class="fas fa-users me-2"></i>Show Friends </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-map-marker-alt me-2"></i>Location</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="#" class="dropdown-item">depart 1</a>
                            <a href="#" class="dropdown-item">depart 2</a>
                            <a href="#" class="dropdown-item">depart 3</a>
                            <a href="#" class="dropdown-item">depart 4</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2" style="position:relative"><span class="badge bg-danger" id="notificationCount">
                                <?php 
                                    include 'connexion_db.php';
                                    //number of pending tickets
                                    $nb_tickets_Statements =  $db->prepare('SELECT COUNT(*) AS nombre_tickets  FROM tickets 
                                    WHERE status="pending" GROUP BY status');
                                    $nb_tickets_Statements->execute();
                                    $nb_Tickets=$nb_tickets_Statements->fetchAll();
                                    echo $nb_Tickets[0]['nombre_tickets'];
                                ?>
                            </span></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0" style=" width:150px;">
                            <?php
                                include 'notification_admin.php';
                                ?>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php 
                                            include 'photo_url.php';
                                    ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">
                               
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile_photo.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today's Total Tickets</p>
                                <h6 class="mb-0">
                                    <?php
                                        include 'statistics.php';
                                        echo $jr_Tickets[0]['nombre_tickets']; 
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Week's Total Tickets</p>
                                <h6 class="mb-0">
                                <?php
                                        include 'statistics.php';
                                        echo $week_Tickets[0]['nombre_tickets']; 
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Month's Total Tickets</p>
                                <h6 class="mb-0">
                                <?php
                                        include 'statistics.php';
                                        echo $month_Tickets[0]['nombre_tickets']; 
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Year's Total Tickets</p>
                                <h6 class="mb-0">
                                <?php
                                        include 'statistics.php';
                                        echo $year_Tickets[0]['nombre_tickets']; 
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Ticket Status Analysis Dashboard</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Completed & rejected tickets </h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->
            <!-- start manage tickets -->
            <div class="container-fluid pt-4 px-4 " id="showTickets">
                <div class="bg-secondary text-center rounded p-4" style="height: 750px; overflow:auto" id="shTicket">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 title">All Tickets</h6>
                        <button id="toggleButton" class="btn btn-primary">Show All</button>
                    </div>
                    <?php 
                        include 'connexion_db.php';
                        $allTicketsStatements =  $db->prepare('SELECT  ticket_id, title, user_email, message  FROM tickets 
                        WHERE status="pending" OR status="In progress"');
                        $allTicketsStatements->execute();
                        $allTickets=$allTicketsStatements->fetchAll();
                        foreach($allTickets as $one_ticket):?>
                            <div class="card bg-secondary text-start " id="<?php echo $one_ticket['ticket_id']; ?>">
                                <div class="card-requester">
                                    <?php echo $one_ticket['user_email']; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $one_ticket['title']; ?></h5>
                                    <p class="card-text"><?php echo $one_ticket['message']; ?></p>
                                    <div class="d-flex justify-content-between ms-4 mb-4">
                                        <a href="progression.php?del=<?php echo $one_ticket['ticket_id']; ?>" class="btn btn-primary one">In Progress</a>
                                        <a href="validation.php?del=<?php echo $one_ticket['ticket_id']; ?>" class="btn btn-primary one">Valid</a>
                                        <a href="post_delete.php?del=<?php echo $one_ticket['ticket_id']; ?>" class="btn btn-primary one">Reject</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>
            <!-- end mange ticker -->
            <!--connected friend start-->
            <div class="container-fluid pt-4 px-4" id="friends">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">connecting employees</h6>
                            <div class="owl-carousel testimonial-carousel">
                                <?php 
                                    include 'connected_users.php';
                                    foreach ($friends as $friend) :?>
                                        <div class="testimonial-item text-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-4" src="<?php echo $friend['path_photo'];  ?>" style="width: 100px; height: 100px;">
                                            <h5 class="mb-1"><?php echo $friend['e_mail'];?></h5>
                                            <p><?php echo $friend['profession'];?></p>
                                            <p class="mb-0"><?php echo $friend['description'];?></p>
                                        </div>
                                    <?php endforeach; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--connected friend end--> 


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Samm Automation And Test</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">Aloui Houssem</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">Samm Automation And Test</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/canvas1.js"></script>
</body>

</html>