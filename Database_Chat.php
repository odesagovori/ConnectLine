<?php
session_start();
include_once 'Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $userId = $_SESSION['email']; // Assuming user ID is stored in session

    if (!empty($message)) {
        $sql = "INSERT INTO database_chat (email, message, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId, $message]);
    }
}

$sql = "SELECT cm.message, u.username, cm.created_at FROM database_chat cm JOIN users u ON cm.email = u.email ORDER BY cm.created_at ASC";
$messages = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Define a function to generate a unique color for each username
function getColor($username) {
    $colors = [
        'red', 'blue', 'green', 'orange', 'purple', 'brown', 'pink', 'cyan', 'magenta', 'lime'
    ];
    return $colors[crc32($username) % count($colors)];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database_Chat</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: linear-gradient(30deg, #25a18e, #645fce);
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 120vh;
        }

        .bg {
            animation:slide 3s ease-in-out infinite alternate;
            background-image: linear-gradient(to bottom left, #004E64 40%, #9FFFCB 40%);
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

        .chat-container {
            flex: 1;
            width: 70%;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            overflow-y: auto;
            max-height: 70vh; /* Set a maximum height for the chat area */
        }

        #messages {
            max-height: 60vh; /* Set a maximum height for the messages area */
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 20px;
            color: #645FCE;
            font-size: 15px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px;
            padding: 10px 10px;
            position: relative; /* Position for the delete button */
        }

        .delete-button {
            position: absolute;
            right: 10px;
            top: 10px;
            background: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: none;
            color: lightcoral;
            cursor: pointer;
        }
        .input-container {
            display: flex;
            margin-top: 20px;
            width: 75%; /* Resize the input container */
            margin-left: auto; /* Center the input container */
            margin-right: auto; /* Center the input container */
            margin-bottom: 30px; /* Add space between input container and footer */
        }

        .input-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #645FCE;
            border-radius: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.5);
        }

        .input-container button {
            padding: 15px;
            border: none;
            background-color: #645FCE;
            font-size: 15px;
            color: white;
            border-radius: 20px;
            margin-left: 10px;
            cursor: pointer;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .username {
            font-size: 15px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid; /* Sign Out shape border design */
            border-radius: 20px; /* Rounder corners */
            padding: 5px 10px; /* Padding for better appearance */
        }

        .timestamp {
            font-size: 10px;
            color: gray;
        }
        
        .footer {
            background-color: #004e64;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            padding: 5px;
            width: 100%;
        }

        .footer a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .chatroom-heading {
            text-align: center;
            font-size: 30px;
            color: white;
            margin-top: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>
<body>
    <div class="bg"></div>

    <div class="navbar">
        <img src="Images/LogoImg.png" alt=LogoImg style="width: auto; height: 50px; float: left;">
        <a href="Home.php">Courses</a>
        <a href="MyAccount.php">My Account</a>
    </div>

    <h1 class="chatroom-heading">Sistemet e Bazës së të Dhënave Chat Room</h1>

    <div class="chat-container">
        <div id="messages">
            <?php foreach ($messages as $msg): ?>
                <div class="message">
                    <strong class="username" style="color: <?php echo getColor($msg['username']); ?>;"><?php echo htmlspecialchars($msg['username']); ?>:</strong> <?php echo htmlspecialchars($msg['message']); ?> <em class="timestamp">(<?php echo date('H:i:s', strtotime($msg['created_at'])); ?>)</em>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="message_id" value="<?php echo $msg['id']; ?>">
                        <button type="submit" name="delete" class="delete-button">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <form method="POST" class="input-container">
        <input type="text" name="message" placeholder="Type your message...">
        <button type="submit">Send</button>
    </form>

    <div class="footer">
        <p>&copy; 2024 Connect Line. All rights reserved. Contact Us: support@connectline.com</p>
    </div>
</body>
</html>