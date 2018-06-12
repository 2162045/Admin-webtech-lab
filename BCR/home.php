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
       <link rel="stylesheet" href="./css/style.css">  
</head>

<body>

        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin.php">Admins</a></li>
          <li><a href="client.php">Clients</a></li>
          <li><a href="sp.php">Service Providers</a></li>
          <li><a href="#">All Users</a></li>
        </ul>
      </li>
        
       
        
       
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Requests<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="adminreq.php">Admins</a></li>
          <li><a href="clientreq.php">Clients</a></li>
          <li><a href="spreq.php">Service Providers</a></li>
           <li><a href="#">All Users</a></li>
        </ul>
      </li>
        
        <li><a href="#">Car Management</a></li>
        <li><a href="#">Rent Management</a></li>
        
        
         
    </ul>
      
      <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
          
      </div>
    </form>
      
       <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
      
      
      
  </div>
</nav>

   
</body>

</html>