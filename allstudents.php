<?php
include("includes/config.php");
include("includes/classes/accounts.php");
include("includes/classes/constants.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update student details in the database
    $name = $_POST["name"];
    $sapid = $_POST["sapid"];
    $dob = $_POST["dob"];
    $phone_no = $_POST["phone_no"];
    $email = $_POST["email"];
    $date_of_admission = $_POST["date_of_admission"];
    $status = $_POST["status"];
    $passout_year = $_POST["passout_year"];

    $sql = "UPDATE student_user SET name='$name', dob='$dob', phone_no='$phone_no', email='$email', date_of_admission='$date_of_admission', status='$status', passout_year='$passout_year' WHERE sapid='$sapid'";
    $result = $con->query($sql);

    if ($result) {
        echo "Student details updated successfully.";
    } else {
        echo "Error updating student details: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin: 0;
        }

        .student-tile {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin: 5px 0;
            color: #555;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #45a049;
        }

        .edit-form {
            display: none;
            max-width: 300px;
            margin: 10px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .edit-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .edit-form button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>All Students</h1>

    <?php
    // Fetch all students from the student_user table
    $sql = "SELECT * FROM student_user";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each student in a tile
        while ($row = $result->fetch_assoc()) {
            echo '<div class="student-tile" data-sapid="' . $row["sapid"] . '">';
            echo '<h2>' . $row["name"] . '</h2>';
            echo '<p>SAP ID: ' . $row["sapid"] . '</p>';
            echo '<p>DOB: ' . $row["dob"] . '</p>';
            echo '<p>Phone: ' . $row["phone_no"] . '</p>';
            echo '<p>Email: ' . $row["email"] . '</p>';
            echo '<p>Date of Admission: ' . $row["date_of_admission"] . '</p>';
            echo '<p>Status: ' . $row["status"] . '</p>';
            echo '<p>Passout Year: ' . $row["passout_year"] . '</p>';
            echo '<button onclick="showEditForm(' . $row["sapid"] . ')">Edit</button>';
            echo '</div>';

            // Display edit form for each student
            echo '<div id="edit-form-' . $row["sapid"] . '" class="edit-form" style="display: none;">';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="sapid" value="' . $row["sapid"] . '">';
            echo '<label for="name">Name:</label>';
            echo '<input type="text" name="name" id="name" value="' . $row["name"] . '">';
            echo '<label for="dob">DOB:</label>';
            echo '<input type="text" name="dob" id="dob" value="' . $row["dob"] . '">';
            echo '<label for="phone_no">Phone:</label>';
            echo '<input type="text" name="phone_no" id="phone_no" value="' . $row["phone_no"] . '">';
            echo '<label for="email">Email:</label>';
            echo '<input type="text" name="email" id="email" value="' . $row["email"] . '">';
            echo '<label for="date_of_admission">Date of Admission:</label>';
            echo '<input type="text" name="date_of_admission" id="date_of_admission" value="' . $row["date_of_admission"] . '">';
            echo '<label for="status">Status:</label>';
            echo '<input type="text" name="status" id="status" value="' . $row["status"] . '">';
            echo '<label for="passout_year">Passout Year:</label>';
            echo '<input type="text" name="passout_year" id="passout_year" value="' . $row["passout_year"] . '">';
            echo '<button type="submit">Update</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "No students found.";
    }
    ?>

    <script>
        function showEditForm(sapid) {
            // Hide all student tiles except for the selected one
            var studentTiles = document.getElementsByClassName("student-tile");
            for (var i = 0; i < studentTiles.length; i++) {
                studentTiles[i].style.display = (studentTiles[i].getAttribute("data-sapid") == sapid) ? "block" : "none";
            }

            // Show the edit form for the selected student
            var editForm = document.getElementById("edit-form-" + sapid);
            editForm.style.display = "block";
        }
    </script>
</body>
</html>
