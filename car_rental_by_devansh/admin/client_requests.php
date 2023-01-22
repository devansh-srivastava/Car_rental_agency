<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to Approve this request?")){
				window.location.href ='approve.php?id='+id;
			}
		}
		function sureToDelete(id){
			if(confirm("Are you sure you want to Delete this request?")){
				window.location.href ='delete.php?id='+id;
			}
		}
	</script>
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
			Client Requests
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Client Requests</h2>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Car Booked</th>
								<th>Adhaar No.</th>
								<th>Status</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT client.client_id,client.fname,client.phone,cars.car_name,cars.hire_cost,client.status 
										FROM client JOIN cars ON client.car_id=cars.car_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><h3><?php echo $row['fname'] ?></h3></td>
								<td><h3><?php echo $row['phone'] ?></h3></td>
								<td><?php echo $row['car_name'] ?></td>
								<td><?php echo $row['hire_cost'] ?></td>
								<td><?php echo $row['status'] ?></td>
								<td><a href="javascript:sureToApprove(<?php echo $row['client_id'];?>)" class="ico del">Approve</a><a href="javascript:sureToDelete(<?php echo $row['client_id'];?>)" class="ico edit">Delete</a></td>
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