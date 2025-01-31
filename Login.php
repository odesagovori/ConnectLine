<?php
session_start();

// Include database and user files
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a new User object and try to log in
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // If the user exists and password is correct
    if ($user->login($email, $password)) {
        // If login is successful, start the session and redirect to Home.php
        $_SESSION['email'] = $email;
        header("Location: Home.php");
        exit;
    } else {
        // If login fails, show an error message
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: rgb(38,62,120);
            background: linear-gradient(90deg, rgba(36,198,220,1) 0%, rgba(81,74,157,1) 55%);
            color: white;
        }

        .navbar {
            padding: 18px;
            text-align: center;
            font-family: 'Arial';
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            border-radius: 30px;
            background: white;
            padding: 40px 20px;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
            width: 350px;
            border: 2px solid;
            text-align: center;
        }

        .login-box img {
            display: block;
            width: 80px;
            margin-bottom: 30px;
            margin-right: auto;
            margin-left: auto;
        }

        .login-box input[type="text"]::placeholder,
        .login-box input[type="password"]::placeholder {
            color: gray;
            font-size: 15px;
            text-align: left;
            font-family: 'Arial';
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 85%;
            padding: 10px;
            border-radius: 10px;
            border-color: #39a1ff;
        }

        .login-box button {
            background: #39a1ff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            width: 60%;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            font-family: 'Arial';
        }
        
        .login-text {
            color:  #39a1ff;
            font-family: 'Arial';
        }
        .login-box button:hover {
            background-color: gray;
        }

        .login-box .button2 {
            color: inherit;
            padding: 12px;
            border: none;
            border-radius: 10px;
            width: 30%;
            cursor: pointer;
            font-size: 12px;
            text-align: center;
            font-family: 'Arial';
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="LoginLogo.png" alt="Login Icon" class="center" style="width: 40%">
            <div class="login-text">
                <h3>Login</h3>
            </div>
            <!-- Login Form -->
            <form action="Login.php" method="POST">
                <input type="text" id="userid" name="email" placeholder="Email" size="15" style="width: 200px" required>
                <br> <br>
                <input type="password" id="pass" name="password" placeholder="Password" style="width: 200px" required>
                <br> <br>
                <button type="submit" id="submit-btn">Login</button>
            </form>
            <br> <br>
            <a href="Register.php" style="text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">Don't have an account? Create one here.</a>
            
            <?php
            // If there's an error message, display it
            if (isset($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const BtnSubmit = document.getElementById('submit-btn');
            BtnSubmit.addEventListener('click', validate);

            function validate(ngjarja) {
                ngjarja.preventDefault();
                const perdoruesi = document.getElementById('userid');
                const fjalkalimi = document.getElementById('pass');
                if (perdoruesi.value === "") {
                    alert("Please enter a username."); perdoruesi.focus();
                    return false;
                }
                if (fjalkalimi.value === "") {
                    alert("Please enter a password."); fjalkalimi.focus();
                    return false;
                }
                this.form.submit(); // Submit the form if validation passes
            }
        });
    </script>

</body>
</html>