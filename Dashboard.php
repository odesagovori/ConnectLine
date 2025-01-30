<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
} else {
    if ($_SESSION['role'] == "user") {
        header("Location: Home.php");
    } else {
?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #f0f0f0;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px; /* Reduced padding */
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px; /* Reduced font size */
        }

        th {
            background-color: rgb(90,112,205);
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            background-color: rgb(90,112,205);
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="ConnectLine.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;"> 
        <a href="Home.php">Courses</a>
        <a href="Chat.php">Chat</a>
        <a href="MyAccount.php">My Account</a>
        <a href="Login.php">Sign Out</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>Edit</th> 
            <th>Delete</th> 
        </tr>
        <?php 
        include_once 'UserRepository.php';
        $userRepository = new UserRepository();
        $users = $userRepository->getAllUsers(); 
        foreach($users as $user){
            echo 
            "
            <tr>
                <td>{$user['id']}</td>
                <td>{$user['name']}</td>
                <td>{$user['lastname']}</td>
                <td>{$user['email']}</td>
                <td>{$user['username']}</td>
                <td>{$user['password']}</td>
                <td><a href='Edit.php?id={$user['id']}'>Edit</a></td>
                <td><a href='Delete.php?id={$user['id']}'>Delete</a></td>
            </tr>
            ";
        }
        ?>
    </table>

    <div class="footer">
        <p>&copy; 2024 ConnectLine. All rights reserved.</p>
    </div>
</body>
</html>
<?php 
}
}
?>