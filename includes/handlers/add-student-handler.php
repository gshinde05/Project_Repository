<?php
if(isset($_POST['addstudentbutton'])) {
	//Login button was pressed
	$name = $_POST['name'];
    $sapid = $_POST['sapid'];
    $dob = $_POST['dob'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $date_of_admission = $_POST['date_of_admission'];
    $status = $_POST['status'];
    $password = $_POST['password'];
-
	$result = $account->addstudent($name, $sapid, $dob, $phone_no, $email, $date_of_admission, $status, $password);
	
	if($result == true) {
		
		$_SESSION['userLoggedIn'] = $username;
		header("Location: faculty_index.php");
	}

}
?>

