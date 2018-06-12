<?php

if(isset($_POST["action"])){
    include('db.php');

    if ($_POST["action"] == 'fetch') {
        $output = '';
        $query = "SELECT * FROM admin";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output .= '
			<table class=" table table boardered table-striped"> 

            <tr>
				<td>ID</td>
				<td>Name</td>
                <td>Email</td>
                <td>Contact Number</td>
				<td>Address</td>
                <td>Role</td>
				<td>Status</td>
				<td>Enable/Disable</td>
                
			</tr>

		';

        foreach ($result as $row ) {
            $status = '';
            if ($row["status"] == 'Active') {
                $status = '<span class="label label-success"> Active</span>';
            }else{
                $status = '<span class="label label-success"> Disabled</span>';
            }
            $output .= '
			<tr>
				<td>'.$row["id_no"].'</td>
                <td>'.$row["firstName"].' '.$row["lastName"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["contactNumber"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["role"].'</td>
				<td>'.$status.'</td>
				<td><button type="button" name="action" class="btn btn-info btn-xs action" data-id="'.$row["id_no"].'" data-status='.$row["status"].'>Change Status</button>


			</tr>
			';
        }
        $output .= '</table>';
        echo $output;
    }
    if($_POST["action"] == 'change_status'){
        $status='';
       if($_POST['status'] == 'Active'){
            $status = 'Disabled';
        }else{
            $status='Active';
        }

        $query = 'UPDATE admin SET status = :status WHERE id_no= :id_no';
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':status'  => $status,
                ':id_no'   => $_POST['id']

            )
        );
        $result=$statement->fetchAll();
        if(isset($result)){
            echo '<div class="alert alert-success">User status has been set to <strong>'.$status.'</strong></div>';
        }
    }
}
?>