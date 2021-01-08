     <?php 
  session_start(); # start session
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>user main page</title>
    	<link rel="stylesheet" type="text/css" href="../css/style.php">

    </head>
    <body>
        <div class='container'>
            <div class='logoutBtn'>
                <form action='logout.php' method='post' class='logout'>
                    <input type='submit' value='logout' name='logout' class='btn'>
                </form>       
            </div>
            <br>
            <div class='topic'>
                <h1>WELCOME TO THE WEBSITE </h1>

            </div>


            <div class ='php-code-section'>
                <?php
                
                // servername and database name

                $servername = "localhost";
                $db = "carregdb";


                    //1.the page displays a list of available cars and their drivers.

                /*establish a connection */
                $userConn = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'],$db);

                     if($userConn){ // when connection is established.

                        /*  create an sql statement*/
                        $sql_Cars = "";
                        $sql_Profiles = "";
                        $userdbAcct =  $_SESSION['userDBAccount'] ;// from the session, is he manager or normal user
                        $uname = $_SESSION['loggedInUsername'];  // get the username of the loggedin user from session

                        if ($userdbAcct == "user") {
                            $sql_Cars = "SELECT * FROM `cars` WHERE license_no ='$uname' ";
                            $sql_Profiles = "SELECT * FROM `drivers` WHERE license_no = '$uname' ";
                        }
                        else{
                            $sql_Cars = "SELECT * FROM `cars` ";

                            // create a second statement
                            $sql_Profiles = "SELECT * FROM `drivers`";

                        }
                        

                        /*execute the statements*/
                        $retrievedRusultCars =  mysqli_query($userConn,$sql_Cars);
                        $retrievedRusultProfile =  mysqli_query($userConn,$sql_Profiles);

                        

                        #display user(s) profile(s)
                        if($retrievedRusultProfile->num_rows > 0){


                            $drivers= "<table border='2'>
                            <tr>
                            <th>LicenseNo.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>BDate</th>
                            <th>CITY</th>
                            <th>Username</th>
                            </tr>";
                            $temp_drivers = '<br><h2>User Profile</h2><br>';
                            while($row = mysqli_fetch_array($retrievedRusultProfile)){
                                $temp_drivers.="<tr>";
                                $temp_drivers.="<th>{$row['license_no']}</th>";
                                $temp_drivers.="<th>{$row['fname']}</th>";
                                $temp_drivers.="<th>{$row['lname']}</th>";
                                $temp_drivers.="<th>{$row['age']}</th>";
                                $temp_drivers.="<th>{$row['bdate']}</th>";
                                $temp_drivers.="<th>{$row['city']}</th>";
                                $temp_drivers.="<th>{$row['username']}</th>";
                                $temp_drivers.="</tr>"; 
                            }
                            $drivers.=$temp_drivers;
                            $drivers.="</table><br>";
                            echo"$drivers";

                        }

                        #display the cars

                        if($retrievedRusultCars->num_rows > 0){
                            $cars= "<table border='2'>
                            <tr>
                            <th>PlateNO.</th>
                            <th>LicenseNo.</th>
                            <th>CarType</th>
                            <th>Fines</th>
                            <th>CITY</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            </tr>";
                            $temp_cars = '<h2>Available Cars</h2><br>';
                            while($row = mysqli_fetch_array($retrievedRusultCars)){
                                $temp_cars.="<tr>";
                                $temp_cars.="<th> {$row['plate_no']}</th>";
                                $temp_cars.="<th>{$row['license_no']}</th>";
                                $temp_cars.="<th>{$row['car_type']}</th>";
                                $temp_cars.="<th>{$row['fines']}</th>";
                                $temp_cars.="<th>{$row['city']}</th>";
                                $temp_cars.="<th><a href='deleteCar.php?p_no=$row[plate_no]' class='btn' > delete</a></th>";
                                $temp_cars.="<th><a href='editCar.php?p_no=$row[plate_no]' class='btn' > edit</a></th>";

                                $temp_cars.="</tr>"; 
                            }
                            $cars.=$temp_cars;
                            /* close connection */
                            mysqli_close($userConn);
                            $cars.="</table><br>";
                            echo"$cars";


                        } 




                    }
                    else{
                        die("connection has failed.");
                    }

                ?>


            </div>

                <div class='car-form-container' >
                                        
                    <form action= '../searchCar.html' method='post' class='returnBtn'>
                        <input type='submit' value='SEARCH CAR' name='search' class='btn'>
                    </form>
                    <form action= '../registerCarForm.html' method='post' class='returnBtn'>
                        <input type='submit' value='REGISTER CAR' name='register ' class='btn'>
                    </form>

                   
                </div>
                

                

                <div class="footer">
                    <p class="para-footer">&copy; automated car registration</p>

                </div>
        </body>
        </html>
       