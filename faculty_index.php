<?php
	include("includes/config.php");
	include("includes/classes/accounts.php");
	include("includes/classes/constants.php");

	$account = new Account($con);

	include("includes/handlers/add-project-handler.php");

	
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="http://localhost/nishitashah/Soham/includes/assets/css/aos.css" rel="stylesheet">
    <link href="http://localhost/nishitashah/Soham/includes/assets/css/bootstrap.min.css" rel="stylesheet">
   
  <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
        }
        .login-container {
  /* Adjust the styles for your main content */
  padding: 20px;
}

.user-info {
  position: fixed;
  top: 10px; /* Adjust the distance from the top */
  right: 10px; /* Adjust the distance from the right */
  display: flex;
  align-items: center;
}

.user-name {
  margin-right: 10px;
  font-weight: bold;
}

.login-icon {
  width: 30px; /* Adjust the width of your login icon */
  height: auto;
  cursor: pointer;
}
a {
  color: #cc1616;
  text-decoration: none;
}

a:hover {
  color: #e82d2d;
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Raleway", sans-serif;
}

/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
.back-to-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 996;
  background: #cc1616;
  width: 40px;
  height: 40px;
  transition: all 0.4s;
}

.back-to-top i {
  font-size: 28px;
  color: #fff;
  line-height: 0;
}

.back-to-top:hover {
  background: #e72323;
  color: #fff;
}

.back-to-top.active {
  visibility: visible;
  opacity: 1;
}

/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #cc1616;
  border-top-color: #efefef;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: animate-preloader 1s linear infinite;
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
@media screen and (max-width: 768px) {
  [data-aos-delay] {
    transition-delay: 0 !important;
  }
}

/*--------------------------------------------------------------
# Top Bar
--------------------------------------------------------------*/
#topbar {
  background: white;
  font-size: 15px;
  height: 40px;
  padding: 0;
  color: rgba(255, 255, 255, 0.6);
}

#topbar .contact-info a {
  line-height: 0;
  color:  lightgray;
  transition: 0.3s;
}

#topbar .contact-info a:hover {
  color: #fff;
}

#topbar .contact-info i {
  color: #cc1616;
  line-height: 0;
  margin-right: 5px;
}

#topbar .contact-info .phone-icon {
  margin-left: 15px;
}

#topbar .social-links a {
  color: black;
  padding: 4px 12px;
  display: inline-block;
  line-height: 1px;
  transition: 0.3s;
}

#topbar .social-links a:hover {
  color: #fff;
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  background: rgba(25, 25, 25, 0.95);
  transition: all 0.5s;
  z-index: 997;
  height: 70px;
}

#header.fixed-top {
  background: #191919;
}

#header .logo {
  font-size: 30px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: white;
}

#header .logo a {
  color: #fff;
}

#header .logo img {
  max-height: 40px;
}

.scrolled-offset {
  margin-top: 70px;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}

.navbar li {
  position: relative;
}

.navbar>ul>li {
  margin-left: 5px;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 25px 15px 24px 15px;
  font-size: 14px;
  color: #fff;
  white-space: nowrap;
  transition: 0.3s;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  background: purple;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 0;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  color: #191919;
}

.navbar .dropdown ul a i {
  font-size: 12px;
}

.navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: #fff;
}

.navbar .dropdown:hover>ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}

.navbar .dropdown .dropdown:hover>ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #fff;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

.mobile-nav-toggle.bi-x {
  color: #cc1616;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.9);
  transition: 0.3s;
  z-index: 999;
}

.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}

.navbar-mobile ul {
  display: block;
  position: absolute;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  padding: 10px 0;
  background-color: #fff;
  overflow-y: auto;
  transition: 0.3s;
}

.navbar-mobile a,
.navbar-mobile a:focus {
  padding: 10px 20px;
  font-size: 15px;
  color: #191919;
}

.navbar-mobile a:hover,
.navbar-mobile .active,
.navbar-mobile li:hover>a {
  color: #cc1616;
  background: none;
}

.navbar-mobile .getstarted,
.navbar-mobile .getstarted:focus {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover,
.navbar-mobile .dropdown ul .active:hover,
.navbar-mobile .dropdown ul li:hover>a {
  color: #cc1616;
}

.navbar-mobile .dropdown>.dropdown-active {
  display: block;
}
        /*header {
            background-color:  purple;
            color: black;
            text-align: center;
            padding: 1em;
        }*/

        section {
            max-width: 800px;
            margin: 2em auto;
            padding: 20px;
            background-color: black;
            box-shadow: 5px 5px 7px 7px purple;
            border-radius: 5px;
            
        }

        h2 {
            color: white;
        }

        label {
            
            color: white;
           
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 1em;
            box-sizing: border-box;
        }

        button {
            background-color: purple;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 50%;
        }

        button:hover {
            background-color: black;
        }
    </style>
</head>
<body>
<!-- Your login form -->
<script src="script.js"></script>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <img src="http://localhost/nishitashah/Soham/includes/images/WhatsApp_Image_2023-11-28_at_19.41.17_425e9a16-transformed.jpeg" height="70" width="500" class="logo"></img>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown">
            <a href="#" class="nav-link">
              <span>Manage Students</span> <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="nav-link scrollto" href="http://localhost/nishitashah/Soham/addstudent.php">Add Students</a></li>
              <li><a class="nav-link scrollto" href="http://localhost/nishitashah/Soham/search-student.php?term=">Search Students</a></li>
             
            </ul>
          </li>
      
          <li class="dropdown">
            <a href="#" class="nav-link">
              <span>Manage Project</span> <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="nav-link scrollto" href="http://localhost/nishitashah/Soham/Add_Project%5b1%5d.php">Add Projects</a></li>
              <li><a class="nav-link scrollto" href="http://localhost/nishitashah/Soham/search-project.php?term=">Search Projects</a></li>
              
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->
      
      
          </div>
        </header><!--
  </header><!-- End Header -->
  <br>
        <h1 style="color:white" align="center">Project Details</h1>

    <section>
        <h2>Add New Project</h2>
        <form action="addproject.php" method="post" enctype="multipart/form-data">
            <label for="projectTitle">Project Title:</label>
            <input type="text" id="projectTitle" name="projectTitle" required>

            <label for="projectDomain">Project Domain:</label>
            <select id="domain" name="projectDomain">
                <option value="web based">Web based</option>
                <option value="ai ml">Machine learning based</option>
                <option value="iot based">IOT based</option>
                <option value="android app">Android App</option>
                <option value="blockchain">Blockchain</option>
            </select>

            <label for="groupLeaderName">Group Leader Name:</label>
            <input type="text" id="groupLeaderName" name="groupLeaderName" required>

            <label for="groupMembers">Group Members:</label>
            <input type="number" id="groupMembers" name="groupMembers" required>

            <label for="guideName">Guide Name:</label>
            <input type="text" id="guideName" name="guideName">

            

            <select id="languagesused" name="languagesused">
                <option value="java">java</option>
                <option value="python">python</option>
                <option value="html/css/js">Html/css/js</option>
            </select>

            <label for="groupLeaderEmail">Group Leader Email:</label>
            <input type="email" id="groupLeaderEmail" name="groupLeaderEmail" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="reportFile">Report File Path:</label>
            <input type="text" id="reportFile" name="reportpath" placeholder="Enter report file path" />

            <label for="zipFile">Zip File Path:</label>
            <input type="text" id="zipFile" name="zippath" placeholder="Enter zip file path" />


           <div align="center">
             <button type="submit" name="addprojectbutton" onclick=''>Submit</button>
           </div>
        </form>
    </section>

</body>
</html>
