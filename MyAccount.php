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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(90,112,205);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: rgb(90,112,205);
            color: white;
            padding: 20px;
            text-align: center;
        }

        header .Account img {
            width: 20%;
            max-width: 150px;
            display: block;
            margin: 0 auto;
        }

        h1 {
            margin-top: 10px;
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
        }

        /* Main Content Styles */
        main {
            padding: 20px;
            flex: 1;
        }

        /* Profile Section */
        #profile {
            background-color: white;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        #profile h2 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        #profile p {
            font-size: 19px;
            margin: 5px 0;
        }

        /* Courses Section */
        #courses {
            background-color: white;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        #courses h2 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        #courses ul {
            list-style: none;
            padding: 0;
        }

        #courses ul li {
            font-size: 19px;
            margin: 5px 0;
        }

        /* Settings Section */
        #settings {
            background-color: white;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #settings h2 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        #settings form {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        #settings label {
            font-size: 19px;
            margin-bottom: 8px;
        }

        #settings input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            border-color: #09f;
            font-size: 17px;
        }

        #settings button {
            background-color: #09f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
        }

        #settings button:hover {
            background-color: gray;
        }

        /* Footer Styles */
        footer {
            background-color: rgb(90,112,205);
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
            <p>Name: <?php echo $user['name']; ?></p>
            <p>Lastname: <?php echo $user['lastname']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
        </section>
        <section id="courses">
            <h2>My Courses</h2>
                <ul>
                    <?php foreach ($courses as $course): ?>
                        <li><?php echo $course['title']; ?></li>
                    <?php endforeach; ?>
                </ul>
        </section>
        <section id="settings">
            <h2>Account Settings</h2>
            <form>
                <label for="password">Change Password:</label>
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