<?php
	ob_start();
	session_start();
	require('connect.php');


	
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Admin Account Monitoring</title>
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
        <div class="page-header">
          <br>
          <h2 style="color:white;margin-left:30px;" align="center">Approval of Request</h2> </div>
        <br>
        <form action="result1.php" method="POST">
          <table style="width:10cm;" class="input-group">
            <tr>
              <td>
                <input type="text" class="form-control" placeholder="Search" name="firstName" required> </td>
              <td>
                <input class="btn btn-default" type="submit" name="submit"> </td>
            </tr>
          </table>
        </form>
        <br>
        <div class="panel panel-default">
          <div class="panel-heading ">
            <h4>Admin Details</h4></div>
          <br>
          <?php
        $sql = mysqli_query($conn,"SELECT * from admin WHERE request='Pending' ORDER BY id_no");
        
        if($sql->num_rows > '0'){
            
			echo "<table class='table table-striped table-bordered table-hover warning id='dataTables-example';>";
 			
			echo "
			
                
            <tr>
				<td>ID</td>
				<td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Contact Number</td>
				<td>Address</td>
                <td>Role</td>
				<td>Request</td>
				<td>Approval</td>
			</tr>
				";
            
            while($row = mysqli_fetch_assoc($sql)){
                	$id_no =$row['id_no'];
					$firstName=$row['firstName']; 
                    $lastName=$row['lastName'];
                    $email=$row['email'];  
                    $contactNumber=$row['contactNumber'];
                    $address=$row['address'];
                    $role=$row['role'];
                    $request=$row['request'];
                
                
                echo"
                <tr>
                
                    <td>$id_no</td>
                    <td>$firstName </td>
                    <td>$lastName </td>
					<td>$email</td>
                    <td>$contactNumber</td>
                    <td>$address</td>
					<td>$role</td>	
					<td>$request</td>
                    <td><form action='changeStatus.php' method='POST'>
                    <button class='btn-primary' value='$id_no,approved' name='approve'>Approved</button>
                    <button class='btn-danger' value='$id_no,blocked' name='block'>Block</button>
                    </form>
                    </td>
                    
                </tr>    
                
              
                
                ";
            }
        }
?>
            <script src="assets/jquery-1.11.3-jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
        </div>
      </div>
  </body>

  </html>