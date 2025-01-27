<?php

include_once 'Database.php';
include_once 'User.php';
include_once 'UserRepository.php';

class UserRepository {
    private $connection; 

    function __construct() {
        $conn = new Database(); 
        $this->connection = $conn->getConnection(); 
    }

    function insertUser($user) {
        $conn = $this->connection;

        $name = $user->getName();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (name, lastname, email, username, password) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql); 

        $statement->execute([$name, $lastname, $email, $username, password_hash($password, PASSWORD_DEFAULT)]);

        echo "<script> alert('User has been inserted successfully!'); </script>";
    }

    function getAllUsers() {
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql); 
        $users = $statement->fetchAll(); 

        return $users; 
    }

    function getUserById($id) {
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE id='$id'";

        $statement = $conn->query($sql); 
        $user = $statement->fetch(); 

        return $user;
    }

    function updateUser($id, $name, $lastname, $email, $username, $password) {
        $conn = $this->connection;

        $sql = "UPDATE user SET name=?, lastname=?, email=?, username=?, password=? WHERE id=?";

        $statement = $conn->prepare($sql); 

        $statement->execute([$name, $lastname, $email, $username, password_hash($password, PASSWORD_DEFAULT), $id]);

        echo "<script>alert('Update was successful');</script>";
    }

    function deleteUser($id) {
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE id=?";

        $statement = $conn->prepare($sql); 

        $statement->execute([$id]);

        echo "<script>alert('Delete was successful');</script>";
    }
}
