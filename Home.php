<?php    
session_start();
$hide = "hide";
if (!isset($_SESSION['email'])) {
    header("Location: Welcome.php");
    exit;
} else {
    if ($_SESSION['role'] == "admin") {
        $hide = ""; // Show Dashboard for admin
    } else {
        $hide = "hide"; // Ensure non-admin users have the Dashboard link hidden
    }
?>

<?php
require_once 'Database.php'; // Include the Database class

$db = new Database();
$conn = $db->getConnection(); // Get the database connection

// Fetch subjects from the database
$query = "SELECT title, image FROM subjects"; // Adjust the query as per your table structure
$stmt = $conn->prepare($query);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .hide {
            display: none;
        }

        body {
            margin: 0;
        }

        .bg {
            animation:slide 3s ease-in-out infinite alternate;
            background-image: linear-gradient(to bottom left, #645fce 40%, #25a18e 40%);
            bottom:0;
            left:-50%;
            opacity:.5;
            position:fixed;
            right:-50%;
            top:0;
            z-index:-1;
        }

        .bg2 {
            animation-direction:alternate-reverse;
            animation-duration:4s;
        }

        .bg3 {
            animation-duration:5s;
        }

        @keyframes slide {
            0% {
                transform:translateX(-25%);
            }
            100% {
                transform:translateX(25%);
            }
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
            color: #004e64;
        }

        .box-container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: stretch;
            align-content: center;
            padding: 50px;
            height: auto;
        }

        .boxes-box {
            border-radius: 30px;
            background: white;
            padding: 80px 1px;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
            width: 280px;
            height: auto;
            border: 2px solid;
            text-align: center;
            flex: 1 1 280px; /* Flexibility added */
            margin: 10px; /* Margin for spacing */
            margin-top: 10px; /* Added gap on top */
            margin-bottom: 10px; /* Added gap on bottom */
        }

        .search-container {
            display: flex;
            justify-content: center; 
            margin-top: 20px;
            align-items: center;
        }

        .search-bar {
            width: 300px;
            padding: 10px 20px;
            font-size: 16px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-radius: 25px; 
            border: 1px solid transparent; /* Changed to transparent */
            outline: none; 
            align-items: center;
            display: flex;
            background: rgba(255, 255, 255, 0.5); /* Made it transparent */
            color: black;
        }

        .card {
            width: 325px;
            background-color: white;
            border-radius: 30px;
            overflow: hidden;
            margin-top: 20px; /* Added gap on top */
            margin-bottom: 20px; /* Added gap on bottom */
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }
        
        .card-content h1 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-content p {
            font-size: 14px;
            color: black;
            margin-bottom: 20px;
        }

        .courses-heading {
            text-align: center;
            font-size: 50px;
            color: white;
            margin-top: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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
        }

        .footer a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .go-to-chat-button {
            background-color: #645FCE; /* Changed button color */
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border: 2.5px solid #004E64;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            float: left; /* Aligns the button to the left */
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
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
            background-color: #00a5cf;
        }

        .dashboard-button {
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
        
        .dashboard-button:hover {
            background-color: #645fce;
        }
    </style>
</head>
<body>
    <!--Navigation bar:-->
    <div class="navbar">
        <img src="Images/LogoImg.png" alt=LogoImg style="width: auto; height: 50px; float: left;"> 
        <a href="Chat.php">General Chat</a>
        <a href="MyAccount.php">My Account</a>
        <button class="dashboard-button <?=$hide?>" onclick="window.location.href='Dashboard.php'">Dashboard</button>
        <?php
        //echo $_SESSION['email'];
        ?>
        <button class="sign-out-button" onclick="window.location.href='Logout.php'">Sign Out</button>
    </div>

    <!--Courses Heading:-->
    <h1 class="courses-heading">Courses</h1>

    <!--Search box:-->
    <div class="search-container">
        <input type="text" placeholder="Search course..." class="search-bar" id="courseSearch" oninput="filterCourses()">
    </div>

    <!--Courses:-->
    <div class="box-container" id="courseContainer">
        <?php 
        $chatMap = [
            'Shkenca Kompjuterike 2' => 'Java_Chat.php',
            'Dizajni dhe Zhvillimi i Web-it' => 'Web_Chat.php',
            'Strukturat Diskrete 1' => 'Math_Chat.php',
            'Hyrje në Algoritme' => 'Algorithms_Chat.php',
            'Rrjeta Kompjuterike dhe Komunikimi' => 'Network_Chat.php',
            'Sistemet e Bazës së të Dhënave' => 'Database_Chat.php',
        ];

        foreach ($subjects as $subject): ?>
            <div class="card" data-title="<?= htmlspecialchars($subject['title']) ?>">
                <img src="<?= htmlspecialchars($subject['image']) ?>" alt="<?= htmlspecialchars($subject['title']) ?>" style="width: 100%;">
                <p style="color: rgb(0, 78, 100); text-align: center; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 18px;"><?= htmlspecialchars($subject['title']) ?></p>
                <button class="go-to-chat-button" onclick="window.location.href='<?= $chatMap[$subject['title']] ?? 'Chat.php' ?>'">Go to Chat</button>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function filterCourses() {
            const searchInput = document.getElementById('courseSearch').value.toLowerCase();
            const courses = document.querySelectorAll('.card');
            courses.forEach(course => {
                const title = course.getAttribute('data-title');
                if (title.includes(searchInput)) {
                    course.style.display = 'block';
                } else {
                    course.style.display = 'none';
                }
            });
        }
    </script>

    <!--Background:-->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <!--Footer:-->
    <div class="footer">
        <p>&copy; 2024 Connect Line. All rights reserved. Contact Us: support@connectline.com</p>
    </div>
</body>
</html>
<?php
}
?>