<?php
include("includes/config.php");
include("includes/classes/accounts.php");
include("includes/classes/constants.php");

// Function to sanitize input data
function sanitize_input($data)
{
    global $con; // Assuming $con is your database connection variable
    return mysqli_real_escape_string($con, htmlspecialchars(trim($data)));
}

// Check if the 'id' is set in the URL
if (isset($_GET['id'])) {
    $project_id = sanitize_input($_GET['id']);

    // Query to retrieve project data
    $sql = "SELECT * FROM projects WHERE ProjectID = $project_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $project_id = $row['ProjectID'];
        $project_title = $row['ProjectTitle'];
        $project_domain = $row['ProjectDomain'];
        $group_leader_name = $row['GroupLeaderName'];
        $group_members = $row['GroupMembers'];
        $guide_name = $row['GuideName'];
        $languages_used = $row['LanguagesUsed'];
        $group_leader_email = $row['GroupLeaderEmail'];
        $description = $row['Description'];
        $report_path = $row['reportpath'];
        $zip_path = $row['zippath'];
    } else {
        echo "No results found for the given project ID.";
        exit();
    }
} else {
    echo "Project ID not provided in the URL.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
</head>
<body>

<h1>Project Details</h1>
<table border="1">
    <tr>
        <th>Project ID</th>
        <td><?php echo $project_id; ?></td>
    </tr>
    <tr>
        <th>Project Title</th>
        <td><?php echo $project_title; ?></td>
    </tr>
    <tr>
        <th>Project Domain</th>
        <td><?php echo $project_domain; ?></td>
    </tr>
    <tr>
        <th>Group Leader Name</th>
        <td><?php echo $group_leader_name; ?></td>
    </tr>
    <tr>
        <th>Group Members</th>
        <td><?php echo $group_members; ?></td>
    </tr>
    <tr>
        <th>Guide Name</th>
        <td><?php echo $guide_name; ?></td>
    </tr>
    <tr>
        <th>Languages Used</th>
        <td><?php echo $languages_used; ?></td>
    </tr>
    <tr>
        <th>Group Leader Email</th>
        <td><?php echo $group_leader_email; ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $description; ?></td>
    </tr>
    <tr>
        <th>Report Path</th>
        <td><?php echo $report_path; ?></td>
    </tr>
    <tr>
        <th>ZIP Path</th>
        <td><?php echo $zip_path; ?></td>
    </tr>
</table>

</body>
</html>
