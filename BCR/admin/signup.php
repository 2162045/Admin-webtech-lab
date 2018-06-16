<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Registration</title>
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
                    <li class="active"><a href="home.php">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="admin.php">Admins</a></li>
                            <li><a href="client.php">Clients</a></li>
                            <li><a href="sp.php">Service Providers</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Requests<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="adminreq.php">Admins</a></li>
                            <li><a href="clientreq.php">Clients</a></li>
                            <li><a href="spreq.php">Service Providers</a></li>
                        </ul>
                    </li>
                    <li><a href="transaction.php">Transaction</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <form class="well form-horizontal" action="signup-action.php" method="post" id="contact_form">
                <fieldset>
                    <!-- Form Name -->
                    <div>
                        <center>
                            <h2>Add Admin</h2></center>
                    </div>
                    <br>
                    <a input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="firstName" placeholder="Enter firstname" class="form-control" type="text" pattern="[a-zA-Z]{1,}" required> </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="lastName" placeholder="Enter lastname" class="form-control" type="text" pattern="[a-zA-Z]{1,}" required> </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" placeholder="sample@gmail.com" class="form-control" type="text"> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="password" placeholder="Password" class="form-control" type="password" required> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="confirmPassword" placeholder="Retype Password" class="form-control" type="password" required> </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone #</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input name="contactNumber" placeholder="+639214660944" class="form-control" type="number" pattern="[1-9]{1}[0-9]{9}"> </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="address" placeholder="Input Address" class="form-control" type="text"> </div>
                            </div>
                        </div>
                        <!-- Select Basic -->
                        <!-- Text input-->
                        <!-- Text input-->
                        <!-- radio checks -->
                        <!-- Text area -->
                        <!-- Success message -->
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button class="btn btn-warning " type="submit" name="register"><i class="fa fa-lock"></i> REGISTER</button>
                                </span>
                            </div>
                        </div>
                    </a>
                </fieldset>
            </form>
        </div>
        <!-- /.container -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
        <script src="js/index.js"></script>
    </body>

</html>