<?php
    // Store Session Data
  //variables for connecting to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "rental";
  
  //connect to database using variables
  $conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_SESSION['id_no'])){ 
    header("location:admin.php");
}else if(isset($_POST['register'])){
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $contactNumber = mysqli_real_escape_string($conn,$_POST['contactNumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $clientReg = "INSERT INTO admin(firstName,lastName,email,password,contactNumber,address) VALUES ('$firstName','$lastName','$email','$password','$contactNumber','$address')";
    $allClient = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email'");
    if(mysqli_num_rows($allClient) >= 1){
        $message = "Username is existing already.";
        echo "<script type='text/javascript'>alert('$message');
        </script> ";
    }else{
        $registerClient = mysqli_query($conn, $clientReg);   
        $message = "Success.Thanks for registring us, we will get back to you shortly.!" ;
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("location:login.php");
    }
    $allClient = mysqli_query($conn,"SELECT firstname,lastname FROM admin");
    $allClient = mysqli_query($conn,"SELECT firstname,lastname FROM admin");
    if(mysqli_num_rows($allClient) >= 1){
         echo "<script>
              alert('Name is existing already.');
              window.location.href='signup.php';
              </script>";
    }else{

        echo "<script>
              alert('Success.Thanks for registring us, we will get back to you shortly.!');
       
              </script>";
    }
}
?>