
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
 		if(isset($_POST["searchDriver"])){

 			if(!empty($_POST['license_no'])){
 				$license_no =  $_POST['license_no'];


 				// to connect to database

 				// servername and database name

                $servername = "localhost";
                $db = "carregdb";

 				$conn = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'],$db);

 				if ($conn) {
 						$result = $conn->query("SELECT * FROM drivers where license_no = '$license_no'");

 						if($result->num_rows > 0){
                            $drivers= "<table border='2'>
                            <tr>
                            <th>LicenseNo.</th>
                            <th>Firstname</th>
                            <th>Lastname.</th>
                            <th>Age</th>
                            <th>BDate</th>
                            <th>CITY</th>
                            </tr>";
                            $temp_driver = '<h2> search result</h2><br>';
                            while($row = mysqli_fetch_array($result)){
                                $temp_driver.="<tr>";
                                $temp_driver.="<th> {$row['license_no']}</th>";
                                $temp_driver.="<th>{$row['fname']}</th>";
                                $temp_driver.="<th>{$row['lname']}</th>";
                                $temp_driver.="<th>{$row['age']}</th>";
                                $temp_driver.="<th>{$row['bdate']}</th>";
                                $temp_driver.="<th>{$row['city']}</th>";
                                $temp_driver.="</tr>"; 
                            }
                            $drivers.=$temp_driver;
                            /* close connection */
                            mysqli_close($conn);
                            $drivers.="</table><br>";
                            echo $drivers;


                        }else{
                            echo "<h2>License number is not found.Try another one.</h2>";
                        }  
 				}
 			}

 			else{
 				echo "<h2> enter license number again. </h2>";
 			}
 		} 



 	 ?>
 
 	</div>
 	
 </body>
 </html>

