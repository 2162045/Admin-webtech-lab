<!DOCTYPE html>
<html lang="en">

<head>
  <title>Baguio Car Rental</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/style.css"> </head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header"> <a class="navbar-brand" href="home.php">BaguioCarRental</a> </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="../admin/home.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../admin/admin.php">Admins</a></li>
            <li><a href="../admin/client.php">Clients</a></li>
            <li><a href="../admin/sp.php">Service Providers</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Requests<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../admin/adminreq.php">Admins</a></li>
            <li><a href="../admin/clientreq.php">Clients</a></li>
            <li><a href="../admin/spreq.php">Service Providers</a></li>
          </ul>
        </li>
        <li><a href="../admin/transaction.php">Transaction</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <br />
  <div id="wrapper">
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
          <div class="row">
            <div class="column"> <img src="../BaguioCarRental/assets/img/30.png" alt="Fjords" style="align:left;"> </div>
            <div class="column"> <img src="../BaguioCarRental/assets/img/31.png" alt="Forest" style="align:center;"> </div>
            <div class="column"> <img src="../BaguioCarRental/assets/img/32.png" alt="Mountains" style="align: right;"> </div>
          </div>
        </center>
      </div>
    </div>
  </section>
  <br>
  <br>
  <!-- /block -->
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
</body>

</html>