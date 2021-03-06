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
            $field='id_no';
            $sort='ASC';
            if(isset($_GET['sorting']))
            {
              if($_GET['sorting']=='ASC')
              {
              $sort='DESC';
              }
              else
              {
                $sort='ASC';
              }
            }
            
            if($_GET['field']=='id_no')
                {
                   $field = "id_no"; 
                }
                elseif($_GET['field']=='firstName')
                {
                   $field = "firstName";
                }
                elseif($_GET['field']=='lastName')
                {
                   $field="lastName";
                }
            elseif($_GET['field']=='email')
                {
                   $field="email";
                }
            elseif($_GET['field']=='contactNumber')
                {
                   $field="contactNumber";
                }
            elseif($_GET['field']=='address')
                {
                   $field="address";
                }
            elseif($_GET['field']=='role')
                {
                   $field="role";
                }
            elseif($_GET['field']=='request')
                {
                   $field="request";
                }
            
            
        $sql = mysqli_query($conn,"SELECT * from admin WHERE request='Pending' ORDER BY $field $sort");
        
        
           echo "<table class='table table-striped table-bordered table-hover warning id='dataTables-example';>";
            
            echo'
            <th><a href="adminreq.php?sorting='.$sort.'&field=id_no">ID</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=firstName">First Name</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=lastName">Last Name</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=email">Email</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=contactNumber">Contact Number</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=address">Address</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=role">Role</a></th>
            <th><a href="adminreq.php?sorting='.$sort.'&field=request">Request</a></th>
            <th>Approval</th>';
            
            if($sql->num_rows > '0'){
            
            
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
                    <button class='btn-primary' value='$id_no,approved' name='approve'>Approve</button>
                    <button class='btn-danger' value='$id_no,blocked' name='block'>Reject</button>
                    </form>
                    </td>
                    
                </tr>";
            }
                
        }
            echo'</table>';
?>
            <script src="assets/jquery-1.11.3-jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
        </div>
      </div>
  </body>

  </html>