<?php
include("connect.php"); //search code
//error_reporting(0);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Client Account Monitoring</title>
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
        <div class="container">
            <h2 style="color:white;margin-left:30px;" align="center">Client Accounts Monitoring</h2>
            <br />
            <div class="row">
                <table class="table table-striped table-bordered">
                    <br />
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
                            $user_name = $_POST['user_name'];

                            $sql =mysqli_query($conn,"SELECT * FROM user WHERE user_name LIKE '%$user_name%' and  request='Pending' order by id_no");
                            if($sql->num_rows > '0'){

                                echo "<table class='table table-striped table-bordered table-hover warning id='dataTables-example';>";

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
                        ?> </table>
            </div>
        </div>
    </body>

    </html>