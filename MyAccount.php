<?php
session_start();
include_once 'Database.php';
include_once 'UserRepository.php';
include_once 'User.php';

$db = new Database();
$conn = $db->getConnection();

$email = $_SESSION['email']; // Assuming user ID is stored in session
$query = "SELECT name, lastname, email FROM users WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$queryCourses = "SELECT title FROM subjectNames";
$stmtCourses = $conn->prepare($queryCourses);
$stmtCourses->execute();
$courses = $stmtCourses->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password'])) {
    $newPassword = $_POST['password'];
    $userRepo = new UserRepository();
    $userRepo->updateUserPassword($email, $newPassword);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Verdana', 'Geneva', 'Tahoma', sans-serif;
            background: linear-gradient(90deg, rgba(36, 199, 220, 0.65) 0%, rgba(81, 74, 157, 0.7) 55%);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            padding: 5px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        header .Account img {
            width: 20%;
            max-width: 150px;
            display: block;
            margin: 10px auto;
        }

        h1 {
            margin-top: 10px;
            font-size: 2.5em;
        }

        .navbar {
            padding: 15px;
            text-align: right;
            background: transparent;
        }

        .navbar a {
            color: #ffffff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }
        
        .navbar a:hover {
            color: white; /* The 'click' color */
        }

        main {
            padding: 20px;
            flex: 1;
        }

        section {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        section h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #333;
        }

        section p, section ul {
            font-size: 1.2em;
            margin: 5px 0;
            color: #555;
        }

        #settings form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #settings input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        #settings button {
            background-color: #39a1ff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #settings button:hover {
            background-color: #2575fc;
        }

        footer {
            background-color: rgb(90, 112, 205);
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
            font-size: 1em;
        }

        .black-text {
            color: black;
        }

        .bold-text {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class ="Account">
            <img src="Images/LoginPic.png" style="width: 20%" >
        </div>
        <h1>My Account</h1>
        <nav class="navbar">
            <a href="Home.php">Courses</a>
            <a href="Login.php">Logout</a>
        </nav>
    </header>
    <main>
        <section id="profile">
            <h2>Profile Information</h2>
            <p><span class="bold-text">Name: </span><?php echo $user['name']; ?></p>
            <p><span class="bold-text">Lastname: </span><?php echo $user['lastname']; ?></p>
            <p><span class="bold-text">Email: </span><?php echo $user['email']; ?></p>
        </section>
        <section id="courses">
            <h2>My Courses</h2>
                <ul>
                    <?php foreach ($courses as $course): ?>
                        <li><span class="bold-text"><?php echo $course['title']; ?></span></li>
                    <?php endforeach; ?>
                </ul>
        </section>
        <section id="settings">
            <h2>Account Settings</h2>
            <form method="POST">
                <label for="password" class="black-text">Change Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Update Password</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 ConnectLine. All rights reserved.</p>
    </footer>
</body>
</html>