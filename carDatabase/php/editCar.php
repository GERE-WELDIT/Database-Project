<?php
		session_start();

		// serer name and database
		$servername = "localhost";
		$db  = "carregdb";

		// intializing variables

		$plate_no = "";
		$license_no = "";
		$cartype = "";
		$fines = "";
		$city = "";
	
		// upon a click ==>  get the plate number of the car.
		$plate_no = $_GET['p_no'];


		/*establish a connection based on userdbAcct*/  
		$conn = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'],$db);

		if ($conn) {

				/* create an sql statement*/
            	$sql = "SELECT * FROM `cars` WHERE plate_no = '$plate_no'";

            	/*execute a statement*/
            	$results = $conn->query($sql);
            	// $row = mysqli_fetch_array($results);
            	$row = mysqli_fetch_assoc($results);
            	
				#update variables
				$plate_no = $row['plate_no'];
				$license_no = $row['license_no'];
				$cartype = $row['car_type'];
				$fines = $row['fines'];
				$city = $row['city'];
			}
			else{
				die("Unable to connect to site");
			}

?>

<!DOCTYPE html>
<html>
<head>
	<title>edit car</title>
	<link rel="stylesheet" type="text/css" href="../css/edit_css.php">
</head>
<body>
	
	<div class='container'>

		<div class='logoutBtn'>
                <form action='logout.php' method='post' class='logout'>
                    <input type='submit' value='logout' name='logout' class='btn'>
                </form>       
        </div>

        <div class="edit-form-container">
	
			<form action="updateEditedCar.php" method="post">
				<div class="input-group">
					<label>Plate No.</label>
					<input type="text" name="plate_no" value="<?php echo $plate_no; ?>" readonly >
				</div>
				<div class="input-group">
					<label>License No.</label>
					<input type="text" name="license_no" value="<?php echo $license_no; ?>">
				</div>
				<div class="input-group">
					<label>Cartype</label>
					<input type="text" name="cartype" value="<?php echo $cartype; ?>">
				</div>
				
				<div class="input-group">
					<label>Fines</label>
					<input type="text" name="fines" value="<?php echo $fines; ?>">
				</div>
				<div class="input-group">
					<label>City</label>
					<input type="text" name="city" value="<?php echo $city; ?>">
				</div>

				<div class="input-group">
					<input type="submit" class="btn" name="save" value="Save">
				</div>
			</form>
		</div>

	</div>
</body>
</html>


