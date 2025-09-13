


<?php
if(isset($_POST['addprojectbutton'])) {
	//Login button was pressed
	$projectTitle = $_POST['projectTitle'];
    $projectDomain = $_POST['projectDomain'];
    $groupLeaderName = $_POST['groupLeaderName'];
    $groupMembers = $_POST['groupMembers'];
    $guideName = $_POST['guideName'];
    $languagesUsed = $_POST['languagesused'];
    $groupLeaderEmail = $_POST['groupLeaderEmail'];
    $description = $_POST['description'];
    $reportpath = $_POST['reportpath'];
    $zippath = $_POST['zippath'];

    
-
	$result = $account->addProject($projectTitle, $projectDomain, $groupLeaderName, $groupMembers, $guideName, $languagesUsed, $groupLeaderEmail, $description, $reportpath, $zippath);
	
	if($result == true) {
		
		$_SESSION['userLoggedIn'] = $username;
		header("Location: faculty_index.php");
	}

}
?>
