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
            background: linear-gradient(90deg, rgba(36, 198, 220, 1) 0%, rgba(81, 74, 157, 1) 55%);
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

        .heading h1::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 4px;
            display: block;
            margin: 0 auto;
            background-color: rgba(36, 198, 220, 1);
        }

        .heading p {
            font-size: 18px;
            color: white;
            margin-bottom: 35px;
        }

        .container-1{
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
            padding: 12px;
            background-color: #39a1ff;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 15px;
            transition: 0.3s ease;
        }

        .content .Our-courses:hover {
            background-color: gray;
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
            max-width: 550px; /* Increased width */
            width: 100%;
            background: #5a70cd;
            border-radius: 14px;
            padding: 30px;
            scroll-snap-type: x mandatory;
            overflow-x: scroll;
            scroll-padding: 30px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            margin: 0 auto; /* This centers the container horizontally */
            margin-top: 60px;
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
            background: #5a70cd;
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
        .reviews-heading h1::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 4px;
            display: block;
            margin: 0 auto;
            background-color: rgba(36, 198, 220, 1);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="ConnectLine.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;">
        <a href="Home.php">Courses</a>
        <a href="#">Chat</a>
        <a href="MyAccount.php">My Account</a>
        <a href="#">About Us</a>
        <a href="Login.php">Sign Out</a>
    </div>

    <div class="heading">
        <h1>About Us</h1>
    </div>

    <div class="container-1">
        <section class="about">
            <div class="image-1">
                <img src="study-server.avif" alt="" srcset="">
            </div>

            <div class="content">
                <h1>GROUP CHAT THAT'S ALL FUN & GAMES</h1>
                <br>
                <p>
                We are dedicated to providing the best learning experience for our students.
                </p>
                <a href="Home.html" class="Our-courses">Our courses</a>
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
            <img src="Student 2.png" alt="" />
        </div>
        <h2>Anna</h2>
        <p>"It’s easy to connect with others, learn new things, and have fun all in one place.
            Highly recommend it for anyone looking to join a community that combines learning with a great user experience!"</p>
    </div>
    <div class="card">
        <div class="image">
            <img src="Student.png" alt="" />
        </div>
        <h2>Aaron</h2>
        <p>"The courses offered on ConnectLine are incredibly useful and well-structured.
            I’ve learned so much in a short period of time, and the material is always relevant and practical." </p>
    </div>
    <div class="card">
        <div class="image">
            <img src="Student 2.png" alt="" />
        </div>
        <h2>Olivia</h2>
        <p>"I've had an amazing experience using ConnectLine.
            The platform is user-friendly, and I love the variety of tools it offers for learning and connecting with others."</p>
    </div>
    <div class="card">
        <div class="image">
            <img src="Student 3.png" alt="" />
        </div>
        <h2>Lily</h2>
        <p>"It's a great platform for staying organized and motivated while learning.
             It offers all the courses we need to stay ahead in our studies."</p>
    </div>
</section>
</div>
    <br><br>
    <footer>
        <p>&copy; 2024 ConnectLine. All rights reserved.</p>
    </footer>
</body>
</html>
