    <?php 
    session_start(); # start session
    ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>main login page</title>
  	<link rel="stylesheet" type="text/css" href="../css/style.php">
  </head>
  <body>
  	<div class='container'>
      <div>

        <?php 


           $servername = "localhost"; // local host server
           $db = "carregdb";   // database name 

           // Manager's credentials
           $managerAccount = "manager";
           $managerPassword = "manager123";
           // Users credentials
           $userAccount = "user";
           $userPassword = "user123";

           // session variables

           $_SESSION['userDBAccount'] = "";
           $_SESSION['userDBAccountPassword'] = "";
            $_SESSION['loggedInUsername'] = "";
           $_SESSION['loggedInUserPassword'] = "";



        //session_start();  // start a session -> the variables life span is across multiple pages
          function isFormComplete($a, $b){
            $boolValue = false;
            if(!empty($a) && !empty($b)){
             $boolValue  = true;
           }
           return $boolValue;
         }



         if(isset($_POST['login'])){

           $username = $_POST['username'];
           $old_userpassword  = $_POST['pword'];


           if(isFormComplete($username, $old_userpassword)){
             $userpassword = md5($old_userpassword);

              // establish connection with mysql database using manager account
             $manager_conn = mysqli_connect($servername, $managerAccount, $managerPassword, $db);
             /* check connection */
             if($manager_conn){


                  $sql_one = "SELECT * FROM managers WHERE  username ='$username' AND password = '$userpassword'";

                            //execute the statement
                          //  $result=mysqli_query($manager_conn,$sql_one);
                  $resultOne = $manager_conn->query($sql_one); 
                            //$myrows =  mysqli_num_rows($result) ;                             
                           // echo "<script> alert($myrows); </script>";
                  if($resultOne->num_rows > 0){  

                    // the session should be set with the managers details
                    $_SESSION['userDBAccount'] =  $managerAccount;
                    $_SESSION['userDBAccountPassword'] = $managerPassword;
                    $_SESSION['loggedInUsername'] =  $username;
                    $_SESSION['loggedInUserPassword'] = $userpassword;

                    // close connection
                    mysqli_close($manager_conn);
                    echo"<script> window.location = 'managerLandingPage.php' </script>";
                    

                  } else{
                         /* close an existing connection */
                         mysqli_close($manager_conn);
                                      // create a connection 
                         $user_conn = mysqli_connect($servername, $userAccount, $userPassword, $db);

                          // create sql statement
                         $sql_two = "SELECT * From drivers WHERE  username = '$username' AND password = '$userpassword'";
                                       //execute the statement
                         $resultTwo = $user_conn->query($sql_two);
                         if($resultTwo->num_rows > 0){
                          // close user connection with database
                          mysqli_close($user_conn);
                          // the session should have the managers details


                          #the session should be set with the normal user details
                          $_SESSION['userDBAccount'] =  $userAccount;
                          $_SESSION['userDBAccountPassword'] = $userPassword;
                          $_SESSION['loggedInUsername'] =  $username;
                          $_SESSION['loggedInUserPassword'] = $userpassword;


                          echo"<script> window.location = 'userLandingPage.php'</script>";
                          
                            

                        } else{
                            mysqli_close($user_conn);
                            echo"<script> window.location = '../login.html'</script>";
                            
                        }

                }

              }else{ // manager_connection was not successful

                echo"<script> window.location = '../login.html'</script>";

              }

            }
      }

     ?>

   </div>
  </div>



  </body>
  </html>
