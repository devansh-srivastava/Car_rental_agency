<?php
	include '../includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="add_vehicles.php">Dashboard</a>
            <span>&gt;</span>
			Add New Vehicles
			<span>&gt;</span>
			Edit Vehicles
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<div class="box-head">
						<h2>Edit Vehicles</h2>
					</div>
                    <?php
					$id = $_REQUEST['id'];
                                $select = "SELECT * FROM cars WHERE car_id = '$id'";
                                $data = $conn->query($select);
								$result = $data->fetch_assoc();

                    ?>
					<form action="" method="post" enctype="multipart/form-data">
						
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Vehicle Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_name" value="<?php echo $result['car_name'];?>"required />
								</p>	
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Make <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_type" value="<?php echo $result['car_type'];?>" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Number <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_number" value="<?php echo $result['car_number'];?>" required />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Hire Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="hire_cost" value="<?php echo $result['hire_cost'];?>"required />
								</p>
								<p>
									<span class="req">In Terms of Passenger Seats</span>
									<label>Vehicle Capacity<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="capacity" value="<?php echo $result['capacity'];?>" required />
								</p>	
							
						</div>
						
						<div class="buttons">
							<input type="submit" class="button" value="submit" name="send" />
						</div>
						
					</form>
					<?php
                    
							if(isset($_POST['send'])){
								$id = $_REQUEST['id'];
								
								$car_name = $_POST['car_name'];
								$car_type = $_POST['car_type'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
								$car_number = $_POST['car_number'];
								
								$qr = "UPDATE cars SET  car_name='$car_name', car_type='$car_type', hire_cost='$hire_cost', capacity='$capacity', car_number='$car_number', status='Available' WHERE car_id=$id;" ;
								echo
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Edited!\");
											window.location = (\"add_vehicles.php\")
											</script>";
									}
								}
								else{
                                    'Failed';
                                }
                                
							
						?>
				</div>

			</div>
			
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>
	
</body>
</html>