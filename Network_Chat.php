<?php
session_start();
include_once 'Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $userId = $_SESSION['email']; // Assuming user ID is stored in session

    if (!empty($message)) {
        $sql = "INSERT INTO network_chat (email, message, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId, $message]);
    }
}

$sql = "SELECT cm.message, u.username, cm.created_at FROM network_chat cm JOIN users u ON cm.email = u.email ORDER BY cm.created_at ASC";
$messages = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network_Chat</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: linear-gradient(30deg, #25a18e, #645fce);
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 120vh;
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
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            overflow-y: auto;
            max-height: 70vh; /* Set a maximum height for the chat area */
        }
        #messages {
            max-height: 60vh; /* Set a maximum height for the messages area */
            overflow-y: auto; /* Enable scrolling */
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 20px;
            color: #645FCE;
            font-size: 15px;
            background-color: white;
            border: 1px;
            padding: 10px 10px;
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
            font-size: 15px;
            background: rgba(255, 255, 255, 0.5);
            color: white; /* Change input text color to white */
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
        }
        .username {
            font-size: 15px;
            background-color: #645FCE;
            color: white;
            border: 1px solid #645FCE; /* Sign Out shape border design */
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
    <div class="navbar">
        <img src="Images/LogoImg.png" alt=LogoImg style="width: auto; height: 50px; float: left;">
        <a href="Home.php">Courses</a>
        <a href="MyAccount.php">My Account</a>
    </div>

    <h4 class="chatroom-heading">Rrjeta Kompjuterike dhe Komunikimi Chat Room</h1>

    <div class="chat-container">
        <div id="messages">
            <?php foreach ($messages as $msg): ?>
                <div class="message">
                    <strong class="username"><?php echo htmlspecialchars($msg['username']); ?>:</strong> <?php echo htmlspecialchars($msg['message']); ?> <em class="timestamp">(<?php echo date('H:i:s', strtotime($msg['created_at'])); ?>)</em>
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