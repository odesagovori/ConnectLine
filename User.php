<?php
class User {
    private $conn;
    private $table_name = 'userRoles';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $lastname, $email, $username, $password, $role) {
        $query = "INSERT INTO {$this->table_name} (name, lastname, email, username, password, role) VALUES (:name, :lastname, :email, :username, :password, :role)";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Hashing the password
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $query = "SELECT id, name, lastname, email, password, role FROM {$this->table_name} WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if a record exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                // Start the session and store user data
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role']; // Store user role
                return true;
            }
        }
        return false;
    }

    public function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] == 1; // Assuming 1 is the role for admin
    }
}
?>