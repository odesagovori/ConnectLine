<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <style>
        body {
            background: linear-gradient(#40356f, #00a5cf);
            color: white;
        }

        .navbar {
            padding: 18px;
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
            width: 350px;
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
        .login-box input[type="password"]::placeholder,
        .login-box input[type="email"]::placeholder{
            text-align: left;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 85%;
            font-size: 15px;
            padding: 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-radius: 30px;
            border-color: #39a1ff;
            border: 2px solid #00A5CF; /* Single border */
            background: rgba(255, 255, 255, 0.5);
        }
        
        .register-text {
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
        }

        .login-box button {
            background: #00a5cf;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 30px;
            width: 60%;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .login-box button:hover {
            background-color: #004e64;
        }
    </style>
    <div class="login-container">
        <div class="login-box">
            <img src="Images/LoginPic.png" alt="LoginPic" class="center" style="width: 40%">
            <div class="register-text">
                <h3>Register</h3>
            </div>
        <form method="POST" action="Register.php">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <br> <br>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
            <br> <br>
            <input type="text" id="email" name="email" placeholder="E-mail" required>
            <br> <br>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <br> <br>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <br> <br>
            <input type="password" id="repassword" name="repassword" placeholder="Re-enter Password" required>
            <br> <br>
            <button type="submit" id="submit-btn">Create Account</button>
        </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const BtnSubmit = document.getElementById('submit-btn');
            BtnSubmit.addEventListener('click', validate);

            function validate(ngjarja) {
                ngjarja.preventDefault();
                const e = document.getElementById('name');
                const m = document.getElementById('lastname');
                const em = document.getElementById('email');
                const u = document.getElementById('username');
                const p = document.getElementById('password');
                const rp = document.getElementById('repassword');
                if (e.value === "") {
                    alert("Please enter your name."); e.focus();
                    return false;
                }
                if (m.value === "") {
                    alert("Please enter your last name."); m.focus();
                    return false;
                }
                if (em.value === "") {
                    alert("Please enter your email."); em.focus();
                    return false;
                }
                if (u.value === "") {
                    alert("Please enter a username."); u.focus();
                    return false;
                }
                if (p.value === "") {
                    alert("Please enter a password."); p.focus();
                    return false;
                }
                if (rp.value === "") {
                    alert("Please re-enter your password."); rp.focus();
                    return false;
                }
                if (p.value !== rp.value) {
                    alert("Passwords do not match.");
                    rp.focus();
                    return false;
                }
                document.querySelector('form').submit(); // Submit the form if validation passes
            }
        });
    </script>
</body>
</html>

<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    // Get form data
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 0; // Default role for new users

    // Register the user
    if ($user->register($name, $lastname, $email, $username, $password, $role)) {
        header("Location: Login.php"); // Redirect to login page
        exit;
    } else {
        echo "Error registering user!";
    }
}
?>