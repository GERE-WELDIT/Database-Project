
<?php 

session_start();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
    <link rel="stylesheet" type="text/css" href="../css/search_css.php">
 </head>
 <body>
 	<div class="container">
        <div class='logoutBtn'>
                <form action='logout.php' method='post' class='logout'>
                    <input type='submit' value='logout' name='logout' class='btn'>
                </form>       
        </div>
            

 		<?php
 		if(isset($_POST["searchCar"])){

 			if(!empty($_POST['pno'])){
 				$plate_no =  $_POST['pno'];


 				// connect to database

 				// servername and database name

                $servername = "localhost";
                $db = "carregdb";

 				$conn = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'],$db);

 				if ($conn) {
 						$result = $conn->query("SELECT * FROM cars where plate_no = '$plate_no'");

 						if($result->num_rows > 0){
                            $cars= "<table border='2'>
                            <tr>
                            <th>PlateNO.</th>
                            <th>LicenseNo.</th>
                            <th>CarType</th>
                            <th>Fines</th>
                            <th>CITY</th>
                            </tr>";
                            $temp_cars = '<h2>car search results</h2><br>';
                            while($row = mysqli_fetch_array($result)){
                                $temp_cars.="<tr>";
                                $temp_cars.="<th> {$row['plate_no']}</th>";
                                $temp_cars.="<th>{$row['license_no']}</th>";
                                $temp_cars.="<th>{$row['car_type']}</th>";
                                $temp_cars.="<th>{$row['fines']}</th>";
                                $temp_cars.="<th>{$row['city']}</th>";
                                $temp_cars.="</tr>"; 
                            }
                            $cars.=$temp_cars;
                            /* close connection */
                            mysqli_close($conn);
                            $cars.="</table><br>";
                            echo"$cars";


                        }
                        else{
                            echo "<h2>THE ENTERED PLATE NUMBER DOES NOT EXIST IN THE DATABASE.TRY ANOTHEER ONE</h2>.";
                        } 
 				}
 			}

 			else{
 				echo "<h2>enter a car's plate number.<h2>";
 			}
 		} 



 	 ?>
 
 	</div>
 	
 </body>
 </html>

