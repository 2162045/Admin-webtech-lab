<?php
     
    require 'db.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $id_noError = null;
        $firstNameError = null;
        $lastNameError = null;
        $passwordError = null;
        $emailError = null;
        $contactNumberError = null;
        $addressError = null;
        $roleError = null;
       
         
        
        
        // keep track post values
                    $id_no = $_POST['id_no'];
					$firstName= $_POST['firstName'];
					$lastName= $_POST['lastName'];
                    $email= $_POST['email'];  
                    $password  = $_POST['password'];
                    $contactNumber= $_POST['contactNumber'];
                    $address= $_POST['address'];
                    $role= $_POST['role'];
        // validate input
        $valid = true;
        
        
        if (empty($id_no)) {
            $id_noError = 'Please enter Id number';
            $valid = false;
        }
        
        if (empty($firstName)) {
            $firstNameError = 'Please enter firstName';
            $valid = false;
        }elseif(!filter_var(trim($_POST["firstName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $firstNameError = 'Please enter a valid name.';
    } else{
        $firstName = $firstName;
    }
        
         if (empty($lastName)) {
            $lastNameError = 'Please enter lastName';
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
            $passwordError = 'Please enter password';
            $valid = false;
        }
         
        if (empty($contactNumber)) {
            $contactNumberError = 'Please enter Contact Number';
            $valid = false;
        }
        
         if (empty($address)) {
            $addressError = 'Please enter address';
            $valid = false;
        }
        
         if (empty($role)) {
            $roleError = 'Please enter role';
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
        }else{
                echo "Something went wrong. Please try again later.";
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
                        <h3>Create Admin</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                        
                         <div class="control-group <?php echo !empty($id_noError)?'error':'';?>">
                        <label class="control-label">ID Number</label>
                        <div class="controls">
                            <input name="id_num" type="text"  placeholder="ID Number" value="<?php echo !empty($id_no)?$id_no:'';?>">
                            <?php if (!empty($id_noError)): ?>
                                <span class="help-inline"><?php echo $id_noError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                        
                        
                      <div class="control-group <?php echo !empty($firstNameError)?'error':'';?>">
                        <label class="control-label">firstName</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="firstName" value="<?php echo !empty($firstName)?$firstName:'';?>">
                            <?php if (!empty($firstNamErrore)): ?>
                                <span class="help-inline"><?php echo $firstNameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                        <div class="control-group <?php echo !empty($lastNameError)?'error':'';?>">
                        <label class="control-label">lastName</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="lastName" value="<?php echo !empty($lastName)?$lastName:'';?>">
                            <?php if (!empty($lastNameError)): ?>
                                <span class="help-inline"><?php echo $lastNameError;?></span>
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
                        
                        
                        
                           <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">email</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                      <div class="control-group <?php echo !empty($contactNumberError)?'error':'';?>">
                        <label class="control-label">Contact Number</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="contact Number" value="<?php echo !empty($contactNumber)?$contactNumber:'';?>">
                            <?php if (!empty($contactNumberError)): ?>
                                <span class="help-inline"><?php echo $contactNumberError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        
                        
                        <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
                        <label class="control-label">address</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        
                      <div class="control-group <?php echo !empty($roleError)?'error':'';?>">
                        <label class="control-label">Role</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="role" value="<?php echo !empty($role)?$role:'';?>">
                            <?php if (!empty($roleError)): ?>
                                <span class="help-inline"><?php echo $roleError;?></span>
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