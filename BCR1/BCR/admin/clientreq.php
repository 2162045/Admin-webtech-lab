<?php
	ob_start();
	session_start();
	require('connect.php');


	
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title> Client Account Monitoring</title>
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
                <form action="clientresult1.php" method="POST">
                    <table style="width:10cm;" class="input-group">
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="Search" name="user_name" required> </td>
                            <td>
                                <input class="btn btn-default" type="submit" name="submit"> </td>
                        </tr>
                    </table>
                </form>
                <?php
                
                 if($_REQUEST['submit']){
                            $username = $_POST['username'];
        $sql = mysqli_query($conn,"SELECT * from user WHERE request='Pending' order by id_no");
        
        if($sql->num_rows > '0'){
            
			echo "<table class='table table-striped table-bordered table-hover id='dataTables-example';>";
 			
			echo "
			
                
            <tr>
				<td>ID</td>
				<td>Username</td>
  
				<td>Firstname</td>
				<td>Lastname</td>
                <td>Contact Number</td>
				<td>Address</td>
                <td>Email</td>
				<td>Request</td>
				<td>approval</td>
			</tr>
				";
            
            while($row = mysqli_fetch_assoc($sql)){
                	$id_no =$row['id_no'];
                    $user_name=$row['user_name'];
                   
					$firstname=$row['firstname'];
					$lastname=$row['lastname'];
                    $contact_num=$row['contact_num'];
                    $address=$row['address'];
					$email=$row['email'];  
					$request=$row['request'];
                
                
                echo"
                <tr>
                
                    <td>$id_no</td>
                    <td>$user_name</td>
                
					<td>$firstname</td>
					<td>$lastname</td>
                    <td>$contact_num</td>
                    <td>$address</td>
					<td>$email</td>	
					<td>$request</td>
                    <td><form action='clientchangeStatus.php' method='POST'>
                    <button class='btn-primary' value='$id_no,approved' name='approve'>Approved</button>
                    <button class='btn-danger' value='$id_no,blocked' name='block'>Block</button>
                    </form>
                    </td>
                    
                </tr>    
                
                
                
                
                ";
            }
        }
                 }
                
                                        ?>
                    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
                    <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>