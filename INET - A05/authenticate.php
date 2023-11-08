<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection details
    $servername = "localhost";
    $username_db = "root";
    $password_db = "supersecret123";
    $database = "unit_7";

    // Create a database connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query check for a matching record in the users table
    $sql = "SELECT user_id FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    if ($user_id) {
        // Generate a unique session ID
        $session_id = uniqid();
        
        // Store user_id and session_id in session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['session_id'] = $session_id;

        // Insert data into the login_sessions table
        $current_time = time();
        $sql = "INSERT INTO login_sessions (user_id, session_id, last_access_time) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $user_id, $session_id, $current_time);
        $stmt->execute();
        $stmt->close();

        // Redirect to admin.php
        header("Location: admin.php");
    } else {
        // If no match is found, redirect back to the login page
        header("Location: login.html");
    }

    $conn->close();
}
?>