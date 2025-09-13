<?php
if(isset($_POST['button'])) {
	//Login button was pressed
	$username = $_POST['studentname'];
	$password = $_POST['studentpassword'];
-
	$result = $account->s_login($username, $password);
	
	if($result == true) {
		
		$_SESSION['userLoggedIn'] = $username;
		header("Location: student_index.php");
	}

}
?>