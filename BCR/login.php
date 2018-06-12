<?php
    include('db.php');
    if(isset($_SESSION["type"])) {
        header("location:home.php");
    }
    $message = '';

    if(isset($_POST["login"])){
        if(empty($_POST["email"]) && empty($_POST["password"])){
             $message = "<div class='alert alert-danger'>Both Fields are required</div>";
         }else{
              $query = "
              SELECT * FROM admin
              WHERE email = email and role = 'admin' role = 'Seperadmin' 
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
                 
                      if($row["status"] == 'Active'){
                               if($_POST["password"] == $row["password"] && $_POST["email"]== $row["email"]){
                                  $_SESSION["type"] = $row["role"];
                                  header("location: index.php");
                                }else{
                                    $message = '<div class="alert alert-danger">Wrong Password</div>';
                                }
                              }else{
                                   $message = '<div class="alert alert-danger">Your Account has been disabled not not yet approved, please contact admin</div>';
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
  <title>Account Monitoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 </head>

    <body>
        <!--header start-->
        <header class="header black-bg">
            <!--logo start--><a href="index.php" class="logo"><b>e-pon</b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">SIGN IN</a></li>
                </ul>
            </div>
        </header>
        <section>
            <section class="wrapper site-min-height">
                <div class="row mt">
                    <div class="col-lg-4">
                        <div class="container">
                            <h2 align="center">e-pon</h2>
                            <br />
                            <div class="panel panel-default">
                                <div class="panel-heading">Login</div>
                                <div class="panel-body">
                                    <form method="post"> <span class="text-danger"><?php echo $message; ?></span>
                                        <div class="form-group">
                                            <label>User Email</label>
                                            <input type="text" name="email" id="email" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" /> </div>
                                        <div class="form-group">
                                            <input type="submit" name="login" id="login" class="btn btn-info" value="Login" /> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </section>
    </body>
</html>