<?php
//including the database connection file
include("connect.php");

//getting id of the data from url
$id_no = $_GET['id_no'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE  * FROM admin WHERE id_no=$id_no");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>