<?php 
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>delete cars</title>
</head>
<body>
	<div  class="container">

		<div class='logoutBtn'>
		      


	<div class="delete-form">

		<?php

		// server and database name
		$servername = "localhost";
		$db  = "carregdb";

		//get the plate no of the car to be removed
		$license_no = $_GET['lno'];
		
		/*establish a connection based on userdbAcct*/  
		$conn = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'],$db);

		if ($conn) { // if connection created successfully
			/* create an sql statement*/
            $sql = "DELETE FROM `drivers` WHERE license_no = '$license_no'";

            /*execute a statement*/
            $result = mysqli_query($conn,$sql);
            if($result){
            	mysqli_close($conn);

            	if( $_SESSION['userDBAccount']=="manager"){
            			header('location: managerLandingPage.php');
            	}else{
            			header('location: managerLandingPage.php');
            	}
            }else{
            	echo "<script>alert('couldn't delete the entry from database');</script>";
            	if( $_SESSION['userDBAccount']=="manager"){
            			header('location: managerLandingPage.php');
            	}else{
            			header('location: managerLandingPage.php');
            	}
            }

		}else{
			echo "connection has failed.";

		}
		mysqli_close($conn); // close the connection

		?>
		 
	</div>

	</div>

</body>
</html>

