<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        body {
            background: linear-gradient(30deg, #25a18e, #645fce);
        }

        .navbar {
            padding: 15px;
            text-align: right;
        }

        .navbar img {
            max-height: 50px; /* Adjust logo size */
        }

        .heading {
            width: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            margin: 20px auto;
        }

        .heading h1 {
            font-size: 40px;
            color: white;
            margin-bottom: 25px;
            position: relative;
        }

        .heading p {
            font-size: 18px;
            color: white;
            margin-bottom: 35px;
        }

        .container-1 {
            width: 90%;
            margin: 0 auto;
            padding: 10px 20px;
        }

        .about {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .image-1 {
            flex: 1;
            margin-right: 40px;
            overflow: hidden;
        }

        .image-1 img {
            max-width: 80%;
            height: auto;
            display: block;
            transition: 0.5s ease;
        }

        .about-image:hover img {
            transform: scale(1.2);
        }

        .content {
            flex: 1;
        }

        .content h1 {
            font-size: 40px;
            margin-bottom: 15px;
            color: white;
        }

        .content p {
            font-size: 18px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.708);
        }

        .content .Our-courses {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00a5cf;
            color: #fff;
            font-size: 16px;
            border: 2.5px solid white;
            text-decoration: none;
            border-radius: 20px;
            margin-top: 15px;
            transition: 0.3s ease;
        }
        
        .content .Back-To-Start {
            display: inline-block;
            padding: 10px 20px;
            background-color: #25a18e;
            color: #fff;
            font-size: 16px;
            border: 2.5px solid white;
            text-decoration: none;
            border-radius: 20px;
            margin-top: 15px;
            transition: 0.3s ease;
        }

        .content .Our-courses:hover {
            background-color: #40356f;
        }

        .content .Back-To-Start:hover {
            background-color: #40356f;
        }

        @media screen and (max-width: 768px) {
            .heading {
                padding: 0px 20px;
            }

            .heading h1 {
                font-size: 36px;
            }

            .container {
                padding: 0px;
            }

            .about {
                padding: 20px;
                flex-direction: column;
            }

            .image {
                margin-right: 0px;
                margin-bottom: 20px;
            }

            .content p {
                padding: 0px;
                font-size: 16px;
            }

            .content .Our-courses {
                font-size: 16px;
            }
        }

        .container {
            display: flex;
            gap: 12px;
            max-width: 700px; /* Increased width */
            width: 100%;
            background: linear-gradient(#645fce, #00A5CF);
            border-radius: 14px;
            padding: 30px;
            scroll-snap-type: x mandatory;
            overflow-x: scroll;
            scroll-padding: 30px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            margin: 0 auto; /* This centers the container horizontally */
            margin-top: 60px;
            justify-content: flex-start; /* Aligns the slider to the left */
        }

        .container .card {
            display: flex;
            flex: 0 0 100%;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            border-radius: 12px;
            background: #fff;
            scroll-snap-align: start;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .card .image {
            height: 150px;
            width: 150px;
            padding: 4px;
            background: #645FCE;
            border-radius: 50%;
        }

        .image img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
        }

        .card h2 {
            margin-top: 25px;
            color: #333;
            font-size: 22px;
            font-weight: 600;
        }

        .card p {
            margin-top: 4px;
            font-size: 18px;
            font-weight: 400;
            color: #333;
            text-align: center;
        }

        footer {
            background-color: #004e64;
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

        .reviews-heading {
            width: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            margin: 20px auto;
        }

        .reviews-heading h1 {
            font-size: 40px;
            color: white;
            margin-top: 50px;
            position: relative;
        }

        .review-form {
            width: 90%; /* Adjusted width */
            max-width: 550px; /* Set max width to match slider */
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: linear-gradient(#645fce, #00A5CF);
        }

        .review-form h2 {
            text-align: center;
            color: white;
        }

        .review-form textarea {
            font-size: 15px;
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .review-form input[type="email"] {
            width: 100%;
            font-size: 15px;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .review-form button {
            font-size: 20px;
            width: 100%;
            padding: 10px;
            background-color: #645FCE;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .review-form button:hover {
            background-color: #40356F;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="Images/LogoImg.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;">
    </div>

    <div class="container-1">
        <div class="reviews-heading">
            <h1>About Us</h1>
        </div>
        <section class="about">
            <div class="image-1">
                <img src="Images/Welcome1.png" alt="" srcset="">
            </div>

            <div class="content">
                <br> <br> <h1>GROUP CHAT THAT'S ALL FUN & GAMES</h1> <br>
                <p> We are dedicated to providing the best learning experience for our students. </p>
                <a href="OurCourses.php" class="Our-courses">Our Courses</a>
                <a href="Welcome.php" class="Back-To-Start">Back To Start</a>
            </div>
        </section>
    </div>

    <div class="reviews-container">
        <div class="reviews-heading">
            <h1>Student Reviews</h1>
        </div>

        <section class="container">
            <div class="card">
                <div class="image">
                    <img src="Images/Student 2.png" alt="" />
                </div>
                <h2>Student 1</h2>
                <p>"Reviews"</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="Images/Student.png" alt="" />
                </div>
                <h2>Student 2</h2>
                <p>"Reviews"</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="Images/Student 2.png" alt="" />
                </div>
                <h2>Student 3</h2>
                <p>"Reviews"</p>
            </div>
            <div class="card">
                <div class="image">
                    <img src="Images/Student 3.png" alt="" />
                </div>
                <h2>Student 4</h2>
                <p>"Reviews"</p>
            </div>
        </section>
    </div>

    <div class="review-form">
        <h2>Leave a Review</h2>
        <br>
        <form method="POST" action="">
            <textarea name="review" rows="4" cols="50" placeholder="Write your review here..." required></textarea><br>
            <input type="email" name="email" placeholder="Your Email" required><br>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
    <br><br>
    <footer>
        <p>&copy; 2024 Connect Line. All rights reserved. Contact Us: support@connectline.com</p>
    </footer>

    <?php
        include_once 'UserRepository.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $email = $_POST['email'];
            $review = $_POST['review'];

            $userRepo = new UserRepository();
            $userRepo->insertReview($email, $review);
        }
    ?>
</body>
</html>