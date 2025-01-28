<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <style>
    body {
        margin: 0;
        background-color: #e3f2fd;
        background: linear-gradient(-45deg, #fbf9fa, #a5cffc, #ddeeff, rgb(90,112,205));
        background-size: 400% 400%;
        animation: gradient 10s ease infinite;
        height: 100vh;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    ::-webkit-scrollbar {
        height: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 25px;
    }
    ::-webkit-scrollbar-thumb {
        background: #6e93f7;
        border-radius: 25px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #4070f4;
    }
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(90,112,205);
        padding: 10px 20px;
        position: absolute;
        width: 100%;
        top: 0;
        z-index: 1000;
    }
    .navbar img {
        height: 50px;
    }
    .navbar a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: 500;
    }
    .navbar a:hover {
        text-decoration: underline;
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
        transform: translateX(-300px); /* Move the slider slightly to the left */
        margin-top: 160px; /* Added margin to move the slider down */
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
    .footer {
        background-color: rgb(90,112,205);
        color: white;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-align: center;
        padding: 20px;
        width: 100%;
        position: relative;
        bottom: 0;
        margin-top: auto; /* Ensures footer stays at the bottom */
    }

    .footer a {
        color: black;
        text-decoration: none;
        margin: 0 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .about {
        margin-top: 20px; /* Space between the slider and the paragraph */
        text-align: center;
        color: #333;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 32px;
        color: white;
        max-width: 550px; /* Same width as the slider */
        position: absolute; /* Positioning it to the right */
        right: 50px; /* Adjust as needed */
        font-weight: bold; /* Changed to bold */
    }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="ConnectLine.png" alt="ConnectLine"> 
        <div>
            <a href="Home.php">Courses</a>
            <a href="Chat.php">Chat</a>
            <a href="MyAccount.php">My Account</a>
            <a href="Login.php">Sign Out</a>
        </div>
    </div>
    <section class="container">
    <div class="card">
        <div class="image">
        <img src="Student 2.png" alt="" />
        </div>
        <h2>Emri Mbiemri</h2>
        <p>"... Review ..."</p>
    </div>
    <div class="card">
        <div class="image">
        <img src="Student.png" alt="" />
        </div>
        <h2>Emri Mbiemri</h2>
        <p>"... Review ..."</p>
    </div>
    <div class="card">
        <div class="image">
        <img src="Student 2.png" alt="" />
        </div>
        <h2>Emri Mbiemri</h2>
        <p>"... Review ..."</p>
    </div>
    <div class="card">
        <div class="image">
        <img src="Student 3.png" alt="" />
        </div>
        <h2>Emri Mbiemri</h2>
        <p>"... Review ..."</p>
    </div>
    </section>
    <div class="about">
        <p>ABOUT US</p> <br>
        <p>We are dedicated to providing the best learning experience for our students.</p> <br> <br>
    </div>
    <div class="footer">
        <p>&copy; 2024 Connect Line. All rights reserved.</p>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
    </div>
</body>
</html>