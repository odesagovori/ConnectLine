<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="Welcome.css">
</head>
<body>
    <div style="position: relative;">
     <img src="Images/Welcome.png" style="position: absolute; left: 800px; top: 180px; width: 40%;">
    </div> <!---->
    <style>
        body {
            background-color: #e3f2fd;
            background: linear-gradient(-45deg, #fbf9fa, #a5cffc, #ddeeff, rgb(90,112,205));
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
            background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background-color: linear-gradient(to bottom right, rgb(21, 0, 53), rgb(38,62,120));
            padding: 15px;
            text-align: right;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }
         
        .navbar a:hover {
            text-decoration: underline;
        }

    </style>

    <div class="navbar">
        <a href="Login.php">LOGIN</a>
        <a href="Register.php">REGISTER</a>
        <a href="AboutUs.php">ABOUT US</a>
    </div>
     
    <div style="position: relative;">
        <img src="Images/ConnectLine.png" alt="ConnectLine" style="position: absolute; left: 70px; top: -40px; width: 10%;"> 
    </div>

    <div style="position: relative;">
        <img src="Images/Slogan.png" style="position: absolute; left: 60px; top: 150px; width: 40%;">
    </div>

    <div class="d-flex flex-column justify-content-center w-100 h-100"></div>
</body>
</html>