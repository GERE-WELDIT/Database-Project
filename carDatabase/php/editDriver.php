<?php
		session_start();

		// serer name and database
		$servername = "localhost";
		$db  = "carregdb";

		// intializing variables

		$license_no = "";
		$firstname = "";
		$lastname = "";
		$age = "";
		$b_date = "";
		$city = "";
	
		// upon a click ==>  get the plate number of the car.
		$license_no = $_GET['lno'];

		/*establish a connection based on userdbAcct*/  
		$conn = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'],$db);

		if ($conn) {

				/* create an sql statement*/
            	$sql = "SELECT * FROM `drivers` WHERE license_no = '$license_no'";

            	/*execute a statement*/
            	$results = $conn->query($sql);
            	// $row = mysqli_fetch_array($results);
            	$row = mysqli_fetch_assoc($results);
            	
				#update variables
				$license_no = $row['license_no'];
				$firstname = $row['fname'];
				$lastname = $row['lname'];
				$age = $row['age'];;
				$b_date = $row['bdate'];
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
        	<form action="updateEditedDriver.php" method="post">
				<div class="input-group">
					<label>License No.</label>
					<input type="text" name="license_no" value="<?php echo $license_no; ?>"  readonly>
				</div>
				<div class="input-group">
					<label>First Name.</label>
					<input type="text" name="fname" value="<?php echo $firstname; ?>">
				</div>
				<div class="input-group">
					<label>Last Name</label>
					<input type="text" name="lname" value="<?php echo $lastname; ?>">
				</div>
				
				<div class="input-group">
					<label>Age</label>
					<input type="text" name="age" value="<?php echo $age; ?>">
				</div>
				<div class="input-group">
					<label>BDate</label>
					<input type="text" name="bdate" value="<?php echo $b_date; ?>">
				</div>
				<div class="input-group">
					<label>City</label>
					<input type="text" name="city" value="<?php echo $city; ?>">
				</div>

				<div class="">
					<input type="submit" class="btn" name="save" value="Save">
				</div>
	</form>
        	
        </div>

	
	
	</div>
</body>
</html>


