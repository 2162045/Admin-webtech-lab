<?php
// including the database connection file
include_once("connect.php");
$result = mysqli_query($connect, "SELECT * FROM admin ORDER BY id_no DESC");
if(isset($_POST['update']))
{	
$id_no = mysqli_real_escape_string($connect, $_POST['id_no']);
    $firstName = mysqli_real_escape_string($connect, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connect, $_POST['lastName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);	
    $contactNumber = mysqli_real_escape_string($connect, $_POST['contactNumber']);	
    $address = mysqli_real_escape_string($connect, $_POST['address']);	
  	
    	

    // checking empty fields
    if(empty($firstName) || empty($lastName) || empty($email) || empty($contactNumber) || empty($address) || empty($role) || empty($status)) {	

        if(empty($firstName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($lastName)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($contactNumber)) {
            echo "<font color='red'>Contac Number field is empty.</font><br/>";
        }
        if(empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }

    } else 
    {	
        //updating the table
        $result = mysqli_query($connect, "UPDATE admin SET firstName='$firstName', lastName='$lastName', email='$email',contactNumber='$contactNumber',address='$address',role='$role',status='$status' WHERE id_no=$id_no");    

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
    <?php
//getting id from url
$id_no = $_GET['id_no'];

//selecting data associated with this particular id

$result = mysqli_query($connect, "SELECT * FROM admin ORDER BY id_no DESC");
while($res = mysqli_fetch_assoc($result))
{
    $firstName = $res['firstName'];
    $lastName = $res['lastName']; 
    $email = $res['email']; 
    $contactNumber = $res['contactNumber']; 
    $address = $res['address']; 
   
}
?>
        <html>

        <head>
            <title>Edit Data</title>
        </head>

        <body>
            <br/>
            <br/>
            <form method="post" action="edit.php">
                <table border="0">
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="firstName" value="<?php echo $firstName;?>"> </td>
                    </tr>
                    <tr>
                        <tr>
                            <td>Last Name</td>
                            <td>
                                <input type="text" name="lastName" value="<?php echo $lastName;?>"> </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" value="<?php echo $email;?>"> </td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>
                                <input type="text" name="contactNumber" value="<?php echo $contactNumber;?>"> </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" name="address" value="<?php echo $address;?>"> </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="id_no" value="<?php echo $_GET['id_no'];?>"> </td>
                            <td>
                                <input type="submit" name="update" value="Update"> </td>
                        </tr>
                </table>
            </form>
        </body>

        </html>