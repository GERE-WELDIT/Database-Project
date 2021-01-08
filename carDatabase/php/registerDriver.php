   <?php 
  session_start(); # start session
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>register page</title>
  	<link rel="stylesheet" type="text/css" href="css/style.php">
  </head>
  <body>
  	<div class='container'>

      <div class='logoutBtn'>
                <form action='logout.php' method='post' class='logout'>
                    <input type='submit' value='logout' name='logout' class='btn'>
                </form>       
      </div>
      <div>

        <?php 
        
          //database details
          $servername = "localhost";
          $db = "carregdb";
          // user credentials
          $userAccount = "user";
          $userPassword = "user123";
          $noPreviousSession = false;


         if (!isset($_SESSION['userDBAccount'])) {

            $noPreviousSession = true;
                  
          }

         

          function isFormComplete($a,$b,$c, $d, $e, $f,$g,$h){
            $boolValue = false;
              if ( !empty($a)  &&  !empty($b) &&  !empty($c) &&  !empty($d) &&
              !empty($e) &&  !empty($f) && !empty($g) &&  !empty($h)) {
                $boolValue = true;
              }
              return $boolValue;
          }

          if( isset($_POST['register'])) {
                $license_no = $_POST['license_no'];
                $firstname  = $_POST['fname'];
                $lastname   = $_POST['lname'];
                $age        = $_POST['age'];
                $birth_date = $_POST['bdate'];
                $city_name  = $_POST['city'];
                $username   = $_POST['usernameInput'];
                $userpassword  = md5($_POST['passwordInput']);

              // check if form is complete
              if(isFormComplete($license_no,$firstname,$lastname,$age,$birth_date,$city_name,$username,$userpassword)){                   

                  // establish connection with mysql database
                 // we have to cases here: if he is new user or if manger wants to register a driver

                // case 1: no session variables are set...

                $con = (!isset($_SESSION['userDBAccount'])) ? mysqli_connect($servername,$userAccount,$userPassword, $db) : mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'], $db);


                 //$con = mysqli_connect($servername,$userAccount,$userPassword, $db);

                 //}
                //  esle{
                   // $con = mysqli_connect($servername,$_SESSION['userDBAccount'],$_SESSION['userDBAccountPassword'], $db);
                 //}
                  
                  /* check connection */
                  if(!$con) {
                        printf("CONNECTION IS FAILED: %s\n", mysqli_connect_error());
                        exit();
                  }else{
                       
                        //create the sql query statement
                        $sql = "INSERT INTO drivers (license_no, fname, lname,age,bdate, city,username, password) VALUES ('$license_no', '$firstname', '$lastname','$age', '$birth_date', '$city_name','$username','$userpassword')";

                        //execute the statement
                        $result = $con->query($sql);
                         //echo"<script> alert($userpassword) </script>"; 

                        if($result){ // if he is registered, the redirect the user to login page to login.
                          if ($noPreviousSession) {
                              header('location:../login.html');
                            
                          }else{ // he is definetly a manager
                                                     
                                header('location:managerLandingPage.php');

                              }

                        }else{ // if not registered , user is redirected to registerForm.html again.
                          echo"<script> window.location = '../registerDriverForm.html' </script>";                      
                        }
                  
                    /* close connection */
                    mysqli_close($con);

                }
              } 
  	    }



      ?>

  	</div>
  </div>
     
  </body>
  </html>
