<?php

class Account
{

    private $con;
    private $errorArray;


    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function s_login($un, $pw)
    {



        $query = mysqli_query($this->con, "SELECT * FROM student_user WHERE name='$un' AND password='$pw' ");

        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function f_login($un, $pw)
    {



        $query = mysqli_query($this->con, "SELECT * FROM faculty_user WHERE name='$un' AND password='$pw' ");

        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function addstudent($name, $sapid, $dob, $phone_no, $email, $date_of_admission, $status, $password)
    {
        // You should perform any necessary validation and sanitation before inserting data into the database.

        // For example, you can use prepared statements to prevent SQL injection.
        $stmt = $this->con->prepare("INSERT INTO student_user (name, sapid, dob, phone_no, email, date_of_admission, status, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $sapid, $dob, $phone_no, $email, $date_of_admission, $status, $password);

        // Execute the query
        if ($stmt->execute()) {
            // Insert successful
            return true;
        } else {
            // Insert failed
            array_push($this->errorArray, Constants::$insertFailed);
            return false;
        }
    }

    public function addProject($projectTitle, $projectDomain, $groupLeaderName, $groupMembers, $guideName, $languagesUsed, $groupLeaderEmail, $description, $reportpath, $zippath)
    {
        $result = mysqli_query($this->con, "INSERT INTO projects 
       (ProjectTitle, ProjectDomain, GroupLeaderName, GroupMembers, GuideName, 
       LanguagesUsed, GroupLeaderEmail, Description, reportpath, zippath) 
       VALUES 
       ('$projectTitle', '$projectDomain', '$groupLeaderName', '$groupMembers', 
       '$guideName', '$languagesUsed', '$groupLeaderEmail', '$description', 
       '$reportpath', '$zippath')");

        return $result;
    }

    
}
