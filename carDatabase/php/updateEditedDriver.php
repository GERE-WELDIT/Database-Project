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
  <h1> UPDATE A Driver</h1>
</div>

<div>

  <?php 

  //database and server 
  $servername = "localhost";
  $db = "carregdb";
  

  function isFormComplete($a,$b,$c, $d, $e, $f){ # function to check the form is complete.
    $boolValue = false;
    if ( !empty($a)  &&  !empty($b) &&  !empty($c) &&  !empty($d) &&
      !empty($e) && !empty($f)) {
      $boolValue = true;
  }
  return $boolValue;
}



if( isset($_POST['save'])) {
  $license_no = $_POST['license_no'];
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $age = $_POST['age'];
  $b_date = $_POST['bdate'];
  $city_name = $_POST['city'];

  #check if form is complete
  if(isFormComplete($license_no,$firstname,$lastname,$age,$b_date,$city_name)){

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

           $sql = "UPDATE drivers SET license_no='$license_no',fname='$firstname',lname='$lastname',age='$age',bdate='$b_date', city='$city_name'  WHERE license_no = '$license_no'";


            //execute the statement
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
          header("location:editDriver.php");

  }
}



      ?>

    </div>
  </div>

</body>
</html>
