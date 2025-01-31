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
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            padding: 15px;
            text-align: right;
            background-color: rgb(90,112,205);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .logo {
            float: left;
            margin-right: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 2.5em;
            color: rgb(90,112,205);
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
            border: 1px solid #ddd;
            font-size: 14px; 
            border-radius: 2px;
        }

        th {
            background-color: rgb(90,112,205);
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
            background-color: rgb(90,112,205);
            color: white;
            text-align: center;
            padding: 10x;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: auto;
        }

        .footer a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
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
        <img src="Images/ConnectLine.png" alt="ConnectLine" class="logo" style="width: auto; height: 50px;"> 
        <a href="Home.php">Courses</a>
        <a href="Chat.php">Chat</a>
        <a href="MyAccount.php">My Account</a>
        <a href="Login.php">Sign Out</a>
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
        <p>&copy; 2024 Connect Line. All rights reserved</p>
    </div>

<?php 
}
}
?>