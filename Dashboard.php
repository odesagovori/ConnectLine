<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
} else {
    if ($_SESSION['role'] == "user") {
        header("Location: Home.php");
    } else {
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: linear-gradient(30deg, #645fce, #25a18e);
            display: flex;
            flex-direction: column;
        }

        .navbar {
            padding: 15px;
            text-align: right;
            /* background-color: #004E64; */
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
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

        .logo {
            float: left;
            margin-right: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 2.5em;
            color: white; /* User Management */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px; 
            text-align: left;
            border: 1px solid #004e64;
            font-size: 14px; 
            border-radius: 2px;
        }

        th {
            background-color: #004E64;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #e0f7fa; /* Baby blue */
        }

        tr:nth-child(odd) {
            background-color: #ffffff; /* White */
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            background-color: #004e64;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            padding: 5px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto; 
        }

        .footer a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .sign-out-button {
            background-color: #004E64; /* Sign Out button color */
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

        .sign-out-button:hover {
            background-color: #00A5CF;
        }

        .button {
            background-color: rgb(90,112,205);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #6c7abf;
        }

        .edit-button {
            background-color: lightblue;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete-button {
            background-color: lightcoral;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>

    <div class="navbar">
        <img src="Images/LogoImg.png" alt="LogoImg" class="logo" style="width: auto; height: 50px;"> 
        <a href="Chat.php">General Chat</a>
        <a href="Home.php">Courses</a>
        <a href="MyAccount.php">My Account</a>
        <button class="sign-out-button" onclick="window.location.href='Logout.php'">Sign Out</button>
    </div>

    <h1>User Management</h1>

    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SURNAME</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>ROLE</th>
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
            <?php 
            include_once 'UserRepository.php';
            $userRepository = new UserRepository();
            $users = $userRepository->getAllUsers(); 
            foreach($users as $index => $user){
                echo 
                "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['name']}</td>
                    <td>{$user['lastname']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['username']}</td>
                    <td>{$user['password']}</td>
                    <td>{$user['role']}</td>
                    <td><a href='Edit.php?id={$user["id"]}' class='edit-button'>Edit</a></td>
                    <td><a href='Delete.php?id={$user["id"]}' class='delete-button'>Delete</a></td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>

    <div class="footer">
        <p>&copy; 2024 Connect Line. All rights reserved. Contact Us: support@connectline.com</p>
    </div>

<?php 
}
}
?>