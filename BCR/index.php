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
              WHERE email = email and role = 'Admin' or role='SuperAdmin'
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
                      if($row["status"] == 'Active' ){
                               if($_POST["password"] == $row["password"] && $_POST["email"]== $row["email"]){
                                  $_SESSION["type"] = $row["role"];
                                  header("location: home.php");
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
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="./css/login.css"> </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header"> <a class="navbar-brand" href="#">BaguioCarRental</a> </div>
            </div>
        </nav>
        <div class="login">
            <h1>Login</h1>
            <form method="post"> <span class="text-danger"><?php echo $message; ?></span>
                <input type="email" name="email" id="email" placeholder="Email" required="required" />
                <input type="password" name="password" id="password" placeholder="Password" required="required" />
                <button type="submit" name="login" id="login" class="btn btn-primary btn-block btn-large" value="Login">Login</button>
            </form>
            <br>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        </div>
    </body>

    </html>