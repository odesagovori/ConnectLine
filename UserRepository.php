<?php
include_once 'Database.php';
include_once 'User.php';

class UserRepository {
    private $connection; 

    function __construct() {
        $conn = new Database(); 
        $this->connection = $conn->getConnection(); 
    }

    function insertUser($userRoles) {
        $conn = $this->connection;

        $name = $userRoles->getName();
        $lastname = $userRoles->getLastname();
        $email = $userRoles->getEmail();
        $username = $userRoles->getUsername();
        $password = $userRoles->getPassword();
        $role = $userRoles->getRole();

        $sql = "INSERT INTO users (name, lastname, email, username, password, role) VALUES (?,?,?,?,?,?)";

        $statement = $conn->prepare($sql); 

        $statement->execute([$name, $lastname, $email, $username, password_hash($password, PASSWORD_DEFAULT), $role]);

        echo "<script> alert('User has been inserted successfully!'); </script>";
    }

    function getAllUsers() {
        $conn = $this->connection;

        $sql = "SELECT * FROM users";

        $statement = $conn->query($sql); 
        $userRoles = $statement->fetchAll(); 

        return $userRoles; 
    }

    function getUserById($id) {
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE id=?";

        $statement = $conn->prepare($sql); 
        $statement->execute([$id]);
        $userRoles = $statement->fetch(); 

        return $userRoles;
    }

    function getUserByRole($role) {
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE role=?";

        $statement = $conn->prepare($sql); 
        $statement->execute([$role]);
        $userRoles = $statement->fetchAll(); 

        return $userRoles;
    }

    function updateUser($id, $name, $lastname, $email, $username, $password, $role) {
        $conn = $this->connection;

        $sql = "UPDATE users SET name=?, lastname=?, email=?, username=?, password=?, role=? WHERE id=?";

        $statement = $conn->prepare($sql); 

        $statement->execute([$name, $lastname, $email, $username, password_hash($password, PASSWORD_DEFAULT), $role, $id]);

        echo "<script>alert('Update was successful');</script>";
    }

    function deleteUser($id) {
        $conn = $this->connection;

        $sql = "DELETE FROM users WHERE id=?";

        $statement = $conn->prepare($sql); 

        $statement->execute([$id]);

        echo "<script>alert('Delete was successful');</script>";
    }

    function insertReview($email, $review) {
        $conn = $this->connection;

        $sql = "INSERT INTO reviews (email, review) VALUES (?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$email, $review]);
    }
}
?>