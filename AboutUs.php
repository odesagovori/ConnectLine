<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        body{
            background: linear-gradient(90deg, rgba(36,198,220,1) 0%, rgba(81,74,157,1) 55%);
            .navbar {
            /* background-color: rgba(90,112,205,1); */
            /* background-color: linear-gradient(90deg, rgba(90,112,205,1) 0%, rgba(148,185,255,1) 55%); */
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
        }
        .heading{
            width: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            margin: 20px auto;
        }
        .heading h1{
            font-size: 50px;
            color:white ;
            margin-bottom: 25px;
            position: relative;
        }
        .heading h1::after{
            content: "";
            position: absolute;
            width: 100%;
            height: 4px;
            display: block;
            margin: 0 auto;
            background-color:rgba(36,198,220,1);
        }
        .heading p{
            font-size: 18px;
            color:white;
            margin-bottom:35px;

        }
        .container{
            width: 90%;
            margin:0 auto;
            padding: 10px 20px;

        }
        .about{
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;

        }
        .image{
            flex:1;
            margin-right: 40px;
            overflow: hidden;

        }
        .image img{
            max-width: 100%;
            height: auto;
            display: block;
            transition: 0.5s ease;
        }
        .about-image:hover img{
            transform: scale(1.2);
        }
        .content{
           flex: 1; 
        }
        .content h1{
            font-size: 40px;
            margin-bottom: 15px;
            color: white;
        }
        .content p{
            font-size: 18px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.708);

        }
        .content .Our-courses{
            display: inline-block;
            padding: 12px;
            background-color: #39a1ff;
            color:#fff;
            font-size: 18px;
            text-decoration: none;
            border-radius: 10px;
            margin-top: 15px;
            transition: 0.3 ease;

        }
        .content .Our-courses:hover{
            background-color: gray;


        }
        @media screen and(max-width:768px){
            .heading{
                padding: 0px 20px;
            }
            .heading h1{
                font-size: 36px;
            }
            .container{
                padding: 0px;

            }
            .about{
                padding: 20px;
                flex-direction: column;
            }
            .image{
                margin-right:0px ;
                margin-bottom: 20px;
            }
            .content p{
                padding: 0px;
                font-size: 16px; 
            }
            .content .Our-courses{
                font-size: 16px;
            }
        }
        .slider-container {
            position: relative;
            overflow: hidden; 
            width: 100%;
        }

        .card-wrapper {
            display: flex; 
            transition: transform 0.3s ease-in-out;
        }

        .card-list .card-item .card-link{
            width: 400px;
            display: block;
            background: #fff;
            padding: 18px;
            border-radius: 12px;
            text-decoration: none;
            border: 2px solid transparent;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.05);
        }
        .card-list .card-item .card-link:hover{
            border-color:  #09f;

        }
        .card-list .card-link .card-image{
            width: 200px;
            height: auto;
            aspect-ratio: 16 / 9;
            object-fit: contain;
            border-radius: 10px;
        }

        .card-list .card-link .badge{
            color:white ;
            padding: 8px 16px;
            font-size: 17px ;
            font-weight: 500 ;
            margin: 16px 0 18px;
            background: #39a3ffa8;
            width: fit-content;
            border-radius: 50px;
        }

        .card-title{
            font-size: 19px;
            color:rgba(81,74,157,1) 55%;
            font-weight: 600;
        }
      
        /* Slider Navigation */
        .nav-btn {
            position: absolute;
            top: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            z-index: 10;
            border-radius: 50%;
        }

        .prev {
            left: 10px;
            transform: translateY(-50%);
        }

        .next {
            right: 10px;
            transform: translateY(-50%);
        }

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
    <div class="navbar">
        <img src="ConnectLine.png" alt="ConnectLine" style="width: auto; height: 50px; float: left;"> 
        <a href="Home.php">Courses</a>
        <a href="#">Chat</a>
        <a href="My Account.html">My Account</a>
        <a href="AboutUs.html">About Us</a>
        <a href="Login.html">Sign Out</a>
    </div>
    <div class="heading">
        <h1>About Us</h1>
    </div>
    
    <div class="container">
        <section class="about">
            <div class="image">
                <img src="AboutUs.webp" alt="" srcset="">
            </div>

            <div class="content">
                <h1>GROUP CHAT THAT'S ALL FUN & GAMES</h1>
                <br>
                <p>
                    Connect Line is your go-to platform for discovering and accessing all the courses available at your college.
                     It’s designed to help you find all the information you need to plan your academic journey with ease. You can also create study groups and connect with friends to make learning more interactive and fun. Whether you’re tackling assignments together or preparing for exams, Connect Line makes studying easier, collaborative, and more enjoyable!"

                </p>
                <a href="Home.html" class="Our-courses">Our courses</a>
            </div>
        </section>
    </div>
    <div class="slider-container">
        <div class="card-wrapper">
            <ul class="card-list">
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="Student 2.png" alt="Card Image" class="card-image">
                        <p class="badge">Anna</p>
                        <h2 class="card-title">Review</h2>
                        
                    </a>
                </li>
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="Student.png" alt="Card Image" class="card-image">
                        <p class="badge">Aaron</p>
                        <h2 class="card-title">Review</h2>
                        
                    </a>
                </li>
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="Student 3.png" alt="Card Image" class="card-image">
                        <p class="badge">Lily</p>
                        <h2 class="card-title">Review</h2>
                        
                    </a>
                </li>
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="Student 2.png" alt="Card Image" class="card-image">
                        <p class="badge">Olivia</p>
                        <h2 class="card-title">Review</h2>
                        
                    </a>
                </li>
                <li class="card-item">
                    <a href="#" class="card-link">
                        <img src="Student 4.png" alt="Card Image" class="card-image">
                        <p class="badge">John</p>
                        <h2 class="card-title">Review</h2>
                        
                    </a>
                </li>
            </ul>
        </div>
        <button class="arrow arrow-left" onclick="moveSlide(-1)">&#10094;</button>
        <button class="arrow arrow-right" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script>

    let currentIndex = 0;
    
    function moveSlide(direction) {
        const slides = document.querySelector('.card-wrapper');
        const totalSlides = document.querySelectorAll('.card-item').length;
    
        currentIndex += direction;
    
        if (currentIndex < 0) {
            currentIndex = totalSlides - 1; 
        } else if (currentIndex >= totalSlides) {
            currentIndex = 0; 
        }
    
        const offset = -currentIndex * (400 + 15); 
        slides.style.transform = `translateX(${offset}px)`;
}

    </script>

<footer>
    <p>&copy; 2024 ConnectLine. All rights reserved.</p>
</footer>
</body>
</html>
