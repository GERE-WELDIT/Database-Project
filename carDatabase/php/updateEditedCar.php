<?php 
  session_start(); # start session
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>main login page</title>
<link rel="stylesheet" type="text/css" href="css/style.php">
</head>
<body>
<div class='container'>

 <div class="header">
  <h1> UPDATE A CAR</h1>
</div>

<div>

  <?php 

  //database and server 
  $servername = "localhost";
  $db = "carregdb";
  

  function isFormComplete($a,$b,$c, $d, $e){ # function to check the form is complete.
    $boolValue = false;
    if ( !empty($a)  &&  !empty($b) &&  !empty($c) &&  !empty($d) &&
      !empty($e)) {
      $boolValue = true;
  }
  return $boolValue;
}



if( isset($_POST['save'])) {
  $plate_no = $_POST['plate_no'];
  $license_no = $_POST['license_no'];
  $car_type = $_POST['cartype'];
  $fines = $_POST['fines'];
  $city_name = $_POST['city'];

  #check if form is complete
  if(isFormComplete($plate_no,$license_no,$car_type,$fines,$city_name)){

        //now, read the loggedInUser account from the session to make a connection
        $userdbAcct = $_SESSION['userDBAccount'];
        $userDBAcctPwrd = $_SESSION['userDBAccountPassword'];

        // establish connection with mysql database
        $con = mysqli_connect($servername, $userdbAcct, $userDBAcctPwrd, $db);

        /* check connection */
        if(!$con) {
          printf("CONNECTION IS FAILED: %s\n", mysqli_connect_error());
          exit();
        }else{
              //create the sql query statement

           $sql = "UPDATE cars SET plate_no = '$plate_no',license_no='$license_no',car_type='$car_type',fines='$fines',city= '$city_name' WHERE plate_no = '$plate_no'";
            //$sql = "SELECT * FROM `cars` ";
            //execute the statement
            // $result = $con->query($sql);
            $result =  mysqli_query($con,$sql);

            /* close connection */
            mysqli_close($con);

            if($result){
                    
                      if ($userdbAcct == "manager") {

                        header("location:managerLandingPage.php");
                      }else{
                        header("location:userLandingPage.php");

                      }

            }else{

                echo "updating entries failed.";
        
            }
        }
  }else{
         // when form is incomplete
          header("location:editCar.php");

  }
}



      ?>

    </div>
  </div>

</body>
</html>
