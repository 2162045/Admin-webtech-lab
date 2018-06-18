<?php
include("connect.php"); //search code
//error_reporting(0);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Service Provider Account Monitoring</title>
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
        <br />
        <div class="container">
            <h2 style="color:white;margin-left:30px;" align="center">Service Provider Accounts Monitoring</h2>
            <br />
            <div class="row">
                <table class="table table-striped table-bordered">
                    <br />
                    <form action="spresult.php" method="POST">
                        <table style="width:10cm;" class="input-group">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Search" name="username" required> </td>
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
                            $username = $_POST['username'];

                            $sql =mysqli_query($conn,"SELECT * FROM service_provider WHERE  username LIKE '%$username%' order by id");
                            if($sql->num_rows > '0'){

                                echo "<table class='table table-striped table-bordered table-hover warning id='dataTables-example';>";

                                echo "


            <tr>
				<td>User ID</td>
				<td>User Name</td>
                <td>Email</td>
                <td>First Name</td>
                  <td>Last Name</td>
                  <td>Address</td>
                  <td>Contact</td>
                  
                  <td>Status</td>
             
			</tr>
				";

                                while($row = mysqli_fetch_assoc($sql)){
                                    $id =$row['id'];
                                    $username=$row['username'];
                                     $email =$row['email'];
                                    $firstname=$row['first_name'] ;
                                    $lastname=$row['last_name'];
                                     $address=$row['address'];
                                    $contact=$row['contact'];
                                    $status=$row['status'];


                                    echo"
                <tr>

                    <td>$id</td>
                    <td> $username</td>
                    <td>$email</td>
                    <td>$first_name </td
                    <td>$last_name </td>
                    <td>$address</td>
                    <td>$contact</td>
                    <td> $status</td>


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