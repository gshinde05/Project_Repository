<?php
if(isset($_POST['facultybutton'])) {
	//Login button was pressed
	$username = $_POST['facultyname'];
	$password = $_POST['facultypassword'];
-
	$result = $account->f_login($username, $password);
	
	if($result == true) {
		
		$_SESSION['userLoggedIn'] = $username;
		header("Location: faculty_index.php");
	}

}
?>