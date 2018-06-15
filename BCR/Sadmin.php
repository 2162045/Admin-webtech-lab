<?php
include('db.php');
if(isset($_SESSION["type"])) {
    header("location:index.php");
}
$message = '';

if(isset($_POST["login"])){
    if(empty($_POST["email"]) && empty($_POST["password"])){
        $message = "<div class='alert alert-danger'>Both Fields are required</div>";
    }else{
        $query = "
            SELECT * FROM admin
              WHERE email = email and role='SuperAdmin'
              ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'email' => $_POST["email"]

            )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $result = $statement->fetchAll();
            foreach($result as $row){
                if($row["request"] == 'Approved'){
                    if($row["status"] == 'Active'){
                        if($_POST["password"] == $row["password"] && $_POST["email"]== $row["email"]){
                            $_SESSION["type"] = $row["role"];
                            header("location: index.php");
                        }else{
                            $message = '<div class="alert alert-danger">Wrong Password</div>';
                        }
                    }else{
                        $message = '<div class="alert alert-danger">Your Account has been disabled, please contact admin</div>';
                    }
                }else{
                    $message = '<div class="alert alert-danger">Your request is not yet approved</div>';
                }
            }
        }else {
            $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
        }
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Baguio Car Rental</title>
        <link href="assets/css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jssor.slider.min.js"></script>
    </head>

    <body>
        <!--header start-->
        <header class="header black-bg">
            <!--logo start--><a href="admin-home.php" class="logo"><b>BAGUIO CAR RENTAL</b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">SIGN IN</a></li>
                </ul>
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="signup.php">SIGN UP</a></li>
                </ul>
            </div>
        </header>
        <!-- /MAIN CONTENT -->
        <br />
        <section style="background-color:gainsboro;">
            <center>
                <section style="width: 100%;" class="wrapper site-min-height">
                    <div class="row mt">
                        <div class="col-lg-12">
                            <div class="container">
                                <h2 style="padding: 1em;
                                           color: white;
                                           background-color: black;"><center>RENT A CAR NOW!</center></h2>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active"> <img src="../BaguioCarRental/assets/img/1.jpg" alt="Los Angeles" style="width:200%;"> </div>
                                        <div class="item"> <img src="../BaguioCarRental/assets/img/2.jpg" alt="Chicago" style="width:200%;"> </div>
                                        <div class="item"> <img src="../BaguioCarRental/assets/img/3.jpg" alt="New york" style="width:200%;"> </div>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </center>
        </section>
        <section style="margin: 15px;
                        background: #474747;
                        padding: 10px ;
                        font-size: 24px;
                        font-family: baskerville;
                        color: white;
                        text-shadow: 0 -1px 1px;" class="wrapper site-min-height">
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="container">
                        <h2 style=" font-size: 69px;;
                                   text-align: center;
                                   margin: 15px;">Baguio Car Rental</h2>
                        <p> Baguio Car Rental is one of the biggest local car rental companies, located nearby all the most popular city travel destinations. If you need a rental car at Baguio City will be there with an affordable solution to your mobility needs. At all our car rental locations you will be able to choose from a wide range of premium vehicles and services. Whether you need a GPS, child seat, an additional driver or insurance coverage, we can help you upgrade your rent a car with the right add-ons to cover your requirements. Baguio Car Rentals is looking forward to giving you the means to move independently Baguio City in a vehicle that is perfect for your trip. Check out some of the most popular cars being rented.</p>
                    </div>
                    <br>
                    <br>
                    <center>
                        <div style="align:center;" class="row">
                            <div class="column"> <img src="../BaguioCarRental/assets/img/30.png" alt="Fjords" style="width:100%"> </div>
                            <div class="column"> <img src="../BaguioCarRental/assets/img/31.png" alt="Forest" style="width:100%"> </div>
                            <div class="column"> <img src="../BaguioCarRental/assets/img/32.png" alt="Mountains" style="width:100%"> </div>
                            <div class="column"> <img src="../BaguioCarRental/assets/img/33.png" alt="Mountains" style="width:100%"> </div>
                            <div class="column"> <img src="../BaguioCarRental/assets/img/34.png" alt="Mountains" style="width:100%"> </div>
                            <div class="column"> </div>
                        </div>
                    </center>
                </div>
            </div>
        </section>
    </body>
    <footer style="background-color:gray;">
        <div class="row">
            <div class="col-sm-8">
                <iframe src="https://www.google.com/maps/embed?earch/car+rental+in+baguio/@16.4067093,120.5849192,15z?authuser=0" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-sm-4" id="contact2">
                <h3>Baguio Car Rental</h3>
                <hr align="left" width="50%">
                <h4 class="pt-2">Most trusted company</h4> <i class="fas fa-globe" style="color:#000"></i> Victory Liner Baguio Passenger Centre, Utility Rd., Marcoville, Baguio City, Utility Rd, Baguio, 2600 Benguet
                <br>
                <h4 class="pt-2">Contact</h4> <i class="fas fa-phone" style="color:#000"></i> <a style="color:white href=" tel:+ ">(074) 442 4018 </a>
                    <br> <i class="fab fa-road " style="color:#000 "></i><a style="color:white href=" "> Closed. Opens at 9:00 AM Claim this business</a>
                <br>
                <h4 class="pt-2 " style="color:#000; ">Email</h4> <i class="fa fa-envelope " style="color:#000; "></i> <a style="color:white" href=" ">bcr.php</a>
                <br> </div>
        </div>
    </footer>
    <script src="assets/js/jquery.js "></script>
    <script src="assets/js/bootstrap.min.js "></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js "></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js "></script>
    <script class="include " type="text/javascript " src="assets/js/jquery.dcjqaccordion.2.7.js "></script>
    <script src="assets/js/jquery.scrollTo.min.js "></script>
    <script src="assets/js/jquery.nicescroll.js " type="text/javascript "></script>
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js "></script>
    <!--script for this page-->
    <script>
        //custom select box
        $(function () {
            $('select.styled').customSelect();
        });
    </script>
    <script type="text/javascript " src="assets/js/jquery.backstretch.min.js "></script>
    <script>
        $.backstretch("assets/img/background.jpg ", {
            speed: 500
        });
    </script>

    </html>