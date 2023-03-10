<!DOCTYPE html>
<html lang="en">
<head>
	<title>Car Rental</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
			<h2 class="caption" style="text-align: center"><i>Find Your Dream Cars For Rent!</i></h2>
				<h3 class="properties" style="text-align: center">Rolls-Royce || Bugatti || Lamborghini || Ferrari || Koenigsegg</h3>
			</section>
	</section><!--  end hero section  -->
	
	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'includes/config.php';
						$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
						$rs = $conn->query($sel);
						$rws = $rs->fetch_assoc();
			?>
				<li>
					<a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo 'Rs.'.$rws['hire_cost'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Car Make>'.$rws['car_type'];?></a>
						</h1>
						<h2>Car Name/Model: <span class="property_size"><?php echo $rws['car_name'];?></span></h2>
					</div>
				</li>


				<h3>Proceed to Hire <?php echo $rws['car_name'];?>. </h3>


				<?php
					if($_SESSION['email'] && ($_SESSION['pass'])){
						
				?>
				<form method="post">
					<table>
						<tr>
							<td>Start Date:</td>
							<td><input type="date" name="date" required></td>
						</tr>
						<tr>
						<td>No. Of Days:</td>
						<td><select id="days" name="days">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							</select>
						</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="save" value="Rent Now"></td>
						</tr>
					</table>
				</form>
				<?php
					} else
						{
							?>
								<a href="login_C.php">Click to Book</a>
							<?php
						}
				?>
				<?php
						if(isset($_POST['save'])){
							include 'includes/config.php';
							$date = $_POST['date'];
							$days = $_POST['days'];
							$user= $_SESSION['email'];
							$id= $_REQUEST['id'];
							
							$qry = "UPDATE client
							SET car_id = '$_GET[id]', status='Pending', start_date='$date', no_days='$days'
							WHERE email= '$user'";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered. Proceed to pay\");
											window.location = (\"pay.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"book_car.php?id=$id\")
											</script>";
							}
						}
						
					  ?>
			</ul>
		</div>
		<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li>OUR COMPANY</li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</li>


				<li class="links">
					<ul>
						<li>OUR CAR TYPES</li>
						<li><a href="#">Mercedes</a></li>
						<li><a href="#">Range Rover</a></li>
						<li><a href="#">Bugatti</a></li>
						<li><a href="#">Lamborghini</a></li>
					</ul>
				</li>

				<li class="about">
					<p>Rent cars at lowest price.</p>
					<ul>
						<li><a href="http://facebook.com/codeprojectsdotorg/" class="facebook" target="_blank"></a></li>
						<li><a href="http://twitter.com/" class="twitter" target="_blank"></a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div> <br> <br></div>
	</footer><!--  end footer  -->
	
</body>
</html>