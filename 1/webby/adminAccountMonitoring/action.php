<?php

if(isset($_POST["action"])){
	include('db.php');
    
	if ($_POST["action"] == 'fetch') {
		$output = '';
		$query = "SELECT * FROM admin WHERE request ='approved' ORDER BY email ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output .= '
			<table class=" table table boardered table-striped"> 

            <tr>
				<td>ID</td>
				<td>Firstname</td>
				<td>Lastname</td>
                <td>Email</td>
                <td>Password</td>
                <td>Contact Number</td>
				<td>Address</td>
                <td>Role</td>
				<td>Status</td>
				<td>Enable/Disable</td>
                <td>Action</td>
			</tr>
            
		';

		foreach ($result as $row ) {
			$status = '';
			if ($row["status"] == 'Active') {
				$status = '<span class="label label-success"> Active</span>';
			}else{
				$status = '<span class="label label-success"> Inactive</span>';
			}
			$output .= '
			<tr>
				<td>'.$row["id_no"].'</td>
                <td>'.$row["firstName"].'</td>
				<td>'.$row["lastName"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["password"].'</td>
                <td>'.$row["contactNumber"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["role"].'</td>
				<td>'.$status.'</td>
				<td><button type="button" name="action" class="btn btn-info btn-xs action" data-id="'.$row["id_no"].'" data-status='.$row["status"].'>Change Status</button></td>
                
                
                 <td>
                 <a href="read.php"><span class="glyphicon glyphicon-eye-open"></span></a>
                 <a href="update.php"><span class="glyphicon glyphicon-pencil"></span></a>
                 <a href="delete.php"><span class="glyphicon glyphicon-trash"></span></a>
                 </td>
                
                
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}
	if($_POST["action"] == 'change_status'){
		$status='';
		if($_POST['status'] == 'Active'){
			$status = 'Inactive';
		}else{
			$status='Active';
		}

		$query = 'UPDATE admin SET status = :status WHERE id_no= :id_no';
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'  => $status,
				':id_no'		=> $_POST['id']

			)
		);
		$result=$statement->fetchAll();
		if(isset($result)){
			echo '<div class="alert alert-success">User status has been set to <strong>'.$status.'</strong></div>';
		}
	}
}
?>