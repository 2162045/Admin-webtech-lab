<?php

if(isset($_POST["action"])){
    include('db.php');

    if ($_POST["action"] == 'fetch') {
        $output = '';
        $query = "SELECT * FROM service_provider";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output .= '
			<table class=" table table boardered table-striped"> 

            <tr>
				<td>ID</td>
                <td>Username</td>
                <td>Email</td>
				<td>Name</td>
                <td>Contact Number</td>
				<td>Address</td>
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
				<td>'.$row["id"].'</td>
                <td>'.$row["username"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["first_name"].' '.$row["last_name"].'</td>             
                <td>'.$row["contact"].'</td>
                <td>'.$row["address"].'</td>
				<td>'.$status.'</td>
				<td><button type="button" name="action" class="btn btn-info btn-xs action" data-id="'.$row["id"].'" data-status='.$row["status"].'>Change Status</button>


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

        $query = 'UPDATE service_provider SET status = :status WHERE id= :id';
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':status'  => $status,
                ':id'   => $_POST['id']

            )
        );
        $result=$statement->fetchAll();
        if(isset($result)){
            echo '<div class="alert alert-success">User status has been set to <strong>'.$status.'</strong></div>';
        }
    }
}
?>