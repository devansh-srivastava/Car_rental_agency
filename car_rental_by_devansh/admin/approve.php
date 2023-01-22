<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	
	$query = "SELECT car_id FROM client WHERE client_id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$car_id= $row['car_id'];

	$query = "UPDATE client SET status = 'Approved' WHERE client_id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$result = $stmt->execute();

	$query2 = "UPDATE cars SET status = 'Unavailable' WHERE car_id = ?";
	$stmt2 = $conn->prepare($query2);
	$stmt2->bind_param("i", $car_id);
	$result2=  $stmt2->execute();
	
	if($result === TRUE && $result2 === TRUE){
		echo 'Request has Successfully been Approved';
	?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
	<?php
	} else{
		echo 'ERROR!!';
		echo $conn->error;
	}
?>
