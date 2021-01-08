
<?php
	session_start();

	if(isset($_SESSION['loggedInUsername'])){
		session_destroy();   // destroy the session and go to login page;
    echo "<script> window.location = '../login.html' </script>";

	}

	else{ // otherwise, just go to login page;
    echo "<script> window.location = '../login.html' </script>";
	}
?>