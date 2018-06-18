<?php
include("connect.php"); //search code
//error_reporting(0);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Transaction Monitoring</title>
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
            <h2 style="color:white;margin-left:30px;" align="center">Transaction Monitoring</h2>
            <br />
            <div class="row">
                <table class="table table-striped table-bordered">
                    <br />
                    <form action="transactionresult.php" method="POST">
                        <table style="width:10cm;" class="input-group">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Search" name="rent_id" required> </td>
                                <td>
                                    <input class="btn btn-default" type="submit" name="submit"> </td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-heading ">Service Provider Details</div>
                        <?php



                        if($_REQUEST['submit']){
                            $rent_id = $_POST['rent_id'];

                            $sql =mysqli_query($conn,"SELECT 
    rent.rent_id,
    rent.id_no,
    user.user_name,
    rent.id,
    cars.plate_number,
    rent.request,
    cars.date1,
    cars.date2

FROM
    cars
        JOIN
    rent 
    JOIN
    user ON rent_id WHERE rent.request='Approved' GROUP BY rent_id;");
                            if($sql->num_rows > '0'){

                                echo "<table class='table table-striped table-bordered table-hover warning id='dataTables-example';>";

                                echo "


            <tr>
				<td>Rent ID</td>
				<td>User ID</td>
                <td>User Name</td>
                <td>Car ID</td>
                <td>Plate Number</td>
				<td>Request</td>
                <td>Date Returned</td>
				<td>Date Borrowed</td>
			
             
			</tr>
				";

                                while($row = mysqli_fetch_assoc($sql)){
                                    $rent_id =$row['rent_id'];
					$id_no=$row['id_no'];
                    $user_name=$row['user_name'];
                    $id=$row['id'];  
                    $plate_number=$row['plate_number'];
                    $request=$row['request'];
                    $date1=$row['date1'];
                    $date2=$row['date2'];
                 


                                    echo"
                <tr>

                    <td>$rent_id</td>
                    <td>$id_no</td>
                    <td>$user_name</td>
					<td>$id</td>
                    <td>$plate_number</td>
                    <td>$request</td>
					<td>$date1</td>	
                    <td>$date2</td
				


                </tr>    



                ";
                                }
                            }
                        }
                        ?>
                            <script>
                                $(document).ready(function () {
                                    $(document).on('click', '.action', function () {
                                        var id = $(this).data('id');
                                        var status = $(this).data('status');
                                        var action = 'change_status';
                                        $('#message').html('');
                                        if (confirm("Are you Sure you want to change status of this User?")) {
                                            $.ajax({
                                                url: 'action.php'
                                                , method: 'POST'
                                                , data: {
                                                    id: id
                                                    , status: status
                                                    , action: action
                                                }
                                                , success: function (data) {
                                                    if (data != '') {
                                                        load_user_data();
                                                        $('#message').html(data);
                                                    }
                                                }
                                            });
                                        }
                                        else {
                                            return false;
                                        }
                                    });
                                });
                            </script>
                </table>
                </div>
            </div>
    </body>

    </html>