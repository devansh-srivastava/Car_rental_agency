<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="add_vehicles.php">Dashboard</a>
			<span>&gt;</span>
			View Booked Cars
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">View Booked Cars</h2>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Car Booked</th>
                                <th>Rent</th>
								<th>Start date</th>
								<th>No. Of Days</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT client.fname,client.phone,cars.car_name,cars.hire_cost,client.start_date, client.no_days 
										FROM client JOIN cars ON client.car_id=cars.car_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><h3><?php echo $row['fname'] ?></h3></td>
								<td><h3><?php echo $row['phone'] ?></h3></td>
								<td><?php echo $row['car_name'] ?></td>
								<td><?php echo $row['hire_cost'] ?></td>
								<td><?php echo $row['start_date'] ?></td>
                                <td><?php echo $row['no_days'] ?></td>
							</tr>
							<?php
								}
							?>
						</table>
						
						
					</div>
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

	
</body>
</html>