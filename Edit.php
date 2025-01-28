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

    $userRepository->updateUser($id, $name, $lastname, $email, $username, $password);

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
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            padding: 15px;
            text-align: right;
            background-color: rgb(90,112,205);
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

        .footer {
            background-color: rgb(90,112,205);
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

        h3 {
            margin-left: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 15px;
            border-radius: 10px;
            border: none;
            background-color: rgb(90,112,205);
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(70,92,185);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="ConnectLine.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;"> 
        <a href="Home.php">Courses</a>
        <a href="Chat.php">Chat</a>
        <a href="My Account.php">My Account</a>
        <a href="Login.php">Sign Out</a>
    </div>

    <h3>Edit User</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$user['id']?>"> <br> <br>
        
        <input type="text" name="name" value="<?=$user['name']?>"> <br> <br>
        
        <input type="text" name="lastname" value="<?=$user['lastname']?>"> <br> <br>
        
        <input type="email" name="email" value="<?=$user['email']?>"> <br> <br>
        
        <input type="text" name="username" value="<?=$user['username']?>"> <br> <br>
        
        <input type="password" name="password" placeholder="Enter new password"> <br> <br>

        <input type="submit" name="editBtn" value="Save Changes"> <br> <br>
    </form>
    <form action="Dashboard.php" method="get">
        <input type="submit" value="Return to Dashboard">
    </form>

    <div class="footer">
        <p>&copy; 2024 ConnectLine. All rights reserved.</p>
    </div>
</body>
</html>
