<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: rgb(90,112,205);
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
        .chat-container {
            width: 80%;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .message.user {
            background-color: #d1e7dd;
            text-align: right;
        }
        .message.bot {
            background-color: #f8d7da;
            text-align: left;
        }
        .input-container {
            display: flex;
            margin-top: 20px;
        }
        .input-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-container button {
            padding: 10px;
            border: none;
            background-color: rgb(90,112,205);
            color: white;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="Home.php">Home</a>
        <a href="MyAccount.php">My Account</a>
        <a href="Logout.php">Sign Out</a>
    </div>

    <div class="chat-container">
        <h2>Chat Room</h2>
        <div id="messages"></div>
        <div class="input-container">
            <input type="text" id="messageInput" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            const input = document.getElementById('messageInput');
            const message = input.value;
            if (message.trim() === '') return;

            const messagesDiv = document.getElementById('messages');
            const userMessage = document.createElement('div');
            userMessage.className = 'message user';
            userMessage.textContent = message;
            messagesDiv.appendChild(userMessage);

            // Simulate bot response
            const botMessage = document.createElement('div');
            botMessage.className = 'message bot';
            botMessage.textContent = "Bot: " + message; // Simple echo for demo
            messagesDiv.appendChild(botMessage);

            input.value = '';
            messagesDiv.scrollTop = messagesDiv.scrollHeight; // Scroll to bottom
        }
    </script>
</body>
</html>