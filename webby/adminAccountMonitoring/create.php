<?php
     
    require 'db.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $id_no = null;
        $firstName = null;
        $lastName = null;
        $password = null;
        $email = null;
        $contactNumber = null;
        $address = null;
        $role = null;
       
         
        
        
        // keep track post values
                    $id_no =$row['id_no'];
					$firstName=$row['firstName'];
					$lastName=$row['lastName'];
                    $email=$row['email'];  
                    $password  =$row['password'];
                    $contactNumber=$row['contactNumber'];
                    $address=$row['address'];
                    $role=$row['role'];
        // validate input
        $valid = true;
        
        
        if (empty($id_no)) {
            $id_no = 'Please enter Id number';
            $valid = false;
        }
        
        if (empty($firstName)) {
            $firstName = 'Please enter firstName';
            $valid = false;
        }
        
         if (empty($lastName)) {
            $lastName = 'Please enter lastName';
            $valid = false;
        }
        
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        
        
        if (empty($password)) {
            $password = 'Please enter password';
            $valid = false;
        }
         
        if (empty($contactNumber)) {
            $mobileError = 'Please enter Contact Number';
            $valid = false;
        }
        
         if (empty($address)) {
            $address = 'Please enter address';
            $valid = false;
        }
        
         if (empty($role)) {
            $role = 'Please enter role';
            $valid = false;
        }
        
        
        
        
        
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO admin (id_no,firstName,lastName,email,password,contactNumber,address,role) values(?, ?, ?,?, ?, ?,?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>