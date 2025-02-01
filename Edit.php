<?php

$userId = $_GET['id'];

include_once 'UserRepository.php';

$userRepository = new UserRepository();

$user  = $userRepository->getUserById($userId);

if (isset($_POST['editBtn'])) {
    $id = $user['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $userRepository->updateUser($id, $name, $lastname, $email, $username, $password, $role);

    header("Location: Dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: linear-gradient(30deg, #25a18e, #645fce);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px; 
        }
        .navbar {
            padding: 15px;
            text-align: right;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }
        
        .navbar a:hover {
            text-decoration: underline;
            color: #004e64;
        }

        .footer {
            background-color: #004e64;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
            width: 100%;
        }

        .footer a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 55%; 
            padding: 15px;
            margin: 10px 0;
            border-radius: 20px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #004E64; /* Sign Out button color */
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border-radius: 20px; /* Rounder corners */
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
        }

        input[type="submit"]:hover {
            background-color: rgb(70,92,185);
        }
        .sign-out-button {
            background-color: #004E64; /* Sign Out button color */
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border-radius: 20px; /* Rounder corners */
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
        }
        .center-text {
            text-align: center;
            margin-top: 20px;
            color: #ffff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="Images/LogoImg.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;"> 
        <a href="Home.php">Courses</a>
        <a href="Chat.php">Chat</a>
        <a href="My Account.php">My Account</a>
        <button class="sign-out-button" onclick="window.location.href='Logout.php'">Sign Out</button>
    </div>
    <div class="center-text">
        <h1>Edit User</h1>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$user['id']?>"> <br> 
        
        <input type="text" name="name" value="<?=$user['name']?>"> <br> 
        
        <input type="text" name="lastname" value="<?=$user['lastname']?>"> <br> 
        
        <input type="email" name="email" value="<?=$user['email']?>"> <br>
        
        <input type="text" name="username" value="<?=$user['username']?>"> <br> 
        
        <input type="password" name="password" placeholder="Enter new password"> <br> 

        <input type="text" name="role" value="<?=$user['role']?>"> <br> 

        <input type="submit" name="editBtn" value="Save Changes"> <br> 
    </form>
    <form action="Dashboard.php" method="get">
        <input type="submit" value="Return to Dashboard">
    </form>
    <br>
    <div class="footer">
        <p>&copy; 2024 ConnectLine. All rights reserved.</p>
    </div>
</body>
</html>