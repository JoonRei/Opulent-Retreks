<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        // Validate password complexity here before hashing
        if (strlen($password) < 8 || !preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password)) {
            echo "Password must contain at least 8 characters with 1 lowercase and 1 uppercase letter.";
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (email, mypassword) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['registrationSuccess'] = true;
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Passwords do not match";
    }
}
?>
