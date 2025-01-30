<?php
session_start();
$hide = "hide";
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
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
            background-image: linear-gradient(-60deg, #09f 50%, #6c3 50%);
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
            border-radius: 25px; 
            border: 1px solid white;
            outline: none; 
            align-items: center;
            display: flex;
            background: white;
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
            background-color: rgb(90,112,205);
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .register-button {
            background-color: rgb(90,112,205);
            color: white;
            border: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            float: left; /* Aligns the button to the left */
            margin-left: 10px; /* Adds space from the left border */
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!--Navigation bar:-->
    <div class="navbar">
        <img src="ConnectLine.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;"> 
        <a href="Home.php">Courses</a>
        <a href="Chat.php">Chat</a>
        <a href="MyAccount.php">My Account</a>
        <a href="AboutUs.php">About Us</a>
        <a href="Dashboard.php" class="<?=$hide?>">Dashboard</a>
        <?php echo $_SESSION['email']; ?>
        <a href="Login.php">Sign Out</a>
    </div>

    <!--Courses Heading:-->
    <h1 class="courses-heading">Courses</h1>

    <!--Search box:-->
    <div class="search-container">
        <input type="text" placeholder="Search course..." class="search-bar" id="courseSearch" oninput="filterCourses()">
    </div>

    <!--Courses:-->
    <div class="box-container" id="courseContainer">
        <?php foreach ($subjects as $subject): ?>
            <div class="card" data-title="<?= htmlspecialchars($subject['title']) ?>">
                <img src="<?= htmlspecialchars($subject['image']) ?>" alt="<?= htmlspecialchars($subject['title']) ?>" style="width: 100%;">
                <p style="color: rgb(90,112,205); text-align: center; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 18px;"><?= htmlspecialchars($subject['title']) ?></p>
                <button class="register-button" onclick="window.location.href='Chat.php'">Go to Chat</button>
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
        <p>&copy; 2024 Connect Line. All rights reserved.</p>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
    </div>
</body>
</html>
<?php
}
?>