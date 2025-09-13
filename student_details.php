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
    $student_id = sanitize_input($_GET['id']);

    // Query to retrieve student data
    $sql = "SELECT * FROM student_user WHERE id = $student_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $sapid = $row['sapid'];
        $name = $row['name'];
        $dob = $row['dob'];
        $phone_no = $row['phone_no'];
        $email = $row['email'];
        $date_of_admission = $row['date_of_admission'];
        $status = $row['status'];
        $passout_year = $row['passout_year'];
        $password = $row['password'];
    } else {
        echo "No results found for the given student ID.";
        exit();
    }
} else {
    echo "Student ID not provided in the URL.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>

<h1>Student Details</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <td><?php echo $id; ?></td>
    </tr>
    <tr>
        <th>SAP ID</th>
        <td><?php echo $sapid; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td><?php echo $dob; ?></td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td><?php echo $phone_no; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <th>Date of Admission</th>
        <td><?php echo $date_of_admission; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo $status; ?></td>
    </tr>
    <tr>
        <th>Passout Year</th>
        <td><?php echo $passout_year; ?></td>
    </tr>
    <tr>
        <th>Password</th>
        <td><?php echo $password; ?></td>
    </tr>
</table>

</body>
</html>
