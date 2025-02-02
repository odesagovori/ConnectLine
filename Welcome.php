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
    <style>
        body {
            background: linear-gradient(30deg, #25a18e, #645fce);
            height: 100vh;
        }

        .navbar {
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
            color: white;
        }

        .login-button {
            background-color: #40356F; /* Dashboard button color */
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border: 2.5px solid white;
            border-radius: 20px; /* Rounder corners */
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
        }
        
        .login-button:hover {
            background-color: #645FCE;
        }

        .register-button {
            background-color: #00A5CF; /* Dashboard button color */
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border: 2.5px solid white;
            border-radius: 20px; /* Rounder corners */
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
        }
        
        .register-button:hover {
            background-color: #004E64;
        }

        .aboutus-button {
            background-color: #25A18E; /* Dashboard button color */
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border: 2.5px solid white;
            border-radius: 20px; /* Rounder corners */
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
        }
        
        .aboutus-button:hover {
            background-color: #7Ae582;
        }
    </style>
    </head>
<body>
    <div style="position: relative;">
     <img src="Images/Welcome.png" style="position: absolute; left: 800px; top: 180px; width: 40%;">
    </div>

    <div class="navbar">
        <button class="login-button" onclick="window.location.href='Login.php'">LOGIN</button>
        <button class="register-button" onclick="window.location.href='Register.php'">REGISTER</button>
        <button class="aboutus-button" onclick="window.location.href='AboutUS.php'">ABOUT US</button>
    </div>

    <div style="position: relative;">
        <img src="Images/LogoImg.png" alt="LogoImg" style="position: absolute; left: 70px; top: -40px; width: 10%;"> 
    </div>

    <div style="position: relative;">
        <img src="Images/SloganPic.png" style="position: absolute; left: 60px; top: 150px; width: 40%;">
    </div>

    <div class="d-flex flex-column justify-content-center w-100 h-100"></div>
</body>
</html>