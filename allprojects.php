<?php
include("includes/config.php");
include("includes/classes/accounts.php");
include("includes/classes/constants.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update project details in the database
    $projectID = $_POST["projectID"];
    $projectTitle = $_POST["projectTitle"];
    $projectDomain = $_POST["projectDomain"];
    $groupLeaderName = $_POST["groupLeaderName"];
    $groupMembers = $_POST["groupMembers"];
    $guideName = $_POST["guideName"];
    $languagesUsed = $_POST["languagesUsed"];
    $groupLeaderEmail = $_POST["groupLeaderEmail"];
    $description = $_POST["description"];
    $reportPath = $_POST["reportPath"];
    $zipPath = $_POST["zipPath"];

    $sql = "UPDATE projects SET 
            ProjectTitle='$projectTitle', 
            ProjectDomain='$projectDomain', 
            GroupLeaderName='$groupLeaderName', 
            GroupMembers='$groupMembers', 
            GuideName='$guideName', 
            LanguagesUsed='$languagesUsed', 
            GroupLeaderEmail='$groupLeaderEmail', 
            Description='$description', 
            reportpath='$reportPath', 
            zippath='$zipPath' 
            WHERE ProjectID='$projectID'";
    $result = $con->query($sql);

    if ($result) {
        echo "Project details updated successfully.";
    } else {
        echo "Error updating project details: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Projects</title>
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

        .project-tile {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 333px;
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
    <h1>All Projects</h1>

    <?php
    // Fetch all projects from the projects table
    $sql = "SELECT * FROM projects";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each project in a tile
        while ($row = $result->fetch_assoc()) {
            echo '<div class="project-tile" data-projectid="' . $row["ProjectID"] . '">';
            echo '<h2>' . $row["ProjectTitle"] . '</h2>';
            echo '<p>Project ID: ' . $row["ProjectID"] . '</p>';
            echo '<p>Domain: ' . $row["ProjectDomain"] . '</p>';
            echo '<p>Leader: ' . $row["GroupLeaderName"] . '</p>';
            echo '<p>Members: ' . $row["GroupMembers"] . '</p>';
            echo '<p>Guide: ' . $row["GuideName"] . '</p>';
            echo '<p>Languages: ' . $row["LanguagesUsed"] . '</p>';
            echo '<p>Leader Email: ' . $row["GroupLeaderEmail"] . '</p>';
            echo '<p>Description: ' . $row["Description"] . '</p>';
            echo '<p>Report Path: ' . $row["reportpath"] . '</p>';
            echo '<p>ZIP Path: ' . $row["zippath"] . '</p>';
            echo '<button onclick="showEditForm(' . $row["ProjectID"] . ')">Edit</button>';
            echo '</div>';

            // Display edit form for each project
            echo '<div id="edit-form-' . $row["ProjectID"] . '" class="edit-form" style="display: none;">';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="projectID" value="' . $row["ProjectID"] . '">';
            echo '<label for="projectTitle">Project Title:</label>';
            echo '<input type="text" name="projectTitle" id="projectTitle" value="' . $row["ProjectTitle"] . '">';
            echo '<label for="projectDomain">Project Domain:</label>';
            echo '<input type="text" name="projectDomain" id="projectDomain" value="' . $row["ProjectDomain"] . '">';
            echo '<label for="groupLeaderName">Group Leader Name:</label>';
            echo '<input type="text" name="groupLeaderName" id="groupLeaderName" value="' . $row["GroupLeaderName"] . '">';
            echo '<label for="groupMembers">Group Members:</label>';
            echo '<input type="text" name="groupMembers" id="groupMembers" value="' . $row["GroupMembers"] . '">';
            echo '<label for="guideName">Guide Name:</label>';
            echo '<input type="text" name="guideName" id="guideName" value="' . $row["GuideName"] . '">';
            echo '<label for="languagesUsed">Languages Used:</label>';
            echo '<input type="text" name="languagesUsed" id="languagesUsed" value="' . $row["LanguagesUsed"] . '">';
            echo '<label for="groupLeaderEmail">Group Leader Email:</label>';
            echo '<input type="text" name="groupLeaderEmail" id="groupLeaderEmail" value="' . $row["GroupLeaderEmail"] . '">';
            echo '<label for="description">Description:</label>';
            echo '<input type="text" name="description" id="description" value="' . $row["Description"] . '">';
            echo '<label for="reportPath">Report Path:</label>';
            echo '<input type="text" name="reportPath" id="reportPath" value="' . $row["reportpath"] . '">';
            echo '<label for="zipPath">ZIP Path:</label>';
            echo '<input type="text" name="zipPath" id="zipPath" value="' . $row["zippath"] . '">';
            echo '<button type="submit">Update</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "No projects found.";
    }
    ?>

    <script>
        function showEditForm(projectID) {
            // Hide all project tiles except for the selected one
            var projectTiles = document.getElementsByClassName("project-tile");
            for (var i = 0; i < projectTiles.length; i++) {
                projectTiles[i].style.display = (projectTiles[i].getAttribute("data-projectid") == projectID) ? "block" : "none";
            }

            // Show the edit form for the selected project
            var editForm = document.getElementById("edit-form-" + projectID);
            editForm.style.display = "block";
        }
    </script>
</body>
</html>
