<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['session_id'])) {
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

    // Retrieve user_id and session_id from the session
    $user_id = $_SESSION['user_id'];
    $session_id = $_SESSION['session_id'];

    // Query check for a matching record in the login_sessions table
    $sql = "SELECT last_access_time FROM login_sessions WHERE user_id = ? AND session_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $session_id);
    $stmt->execute();
    $stmt->bind_result($last_access_time);
    $stmt->fetch();
    $stmt->close();

    if ($last_access_time) {
        // Update the last_access_time in the login_sessions table
        $current_time = time();
        $sql = "UPDATE login_sessions SET last_access_time = ? WHERE user_id = ? AND session_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $current_time, $user_id, $session_id);
        $stmt->execute();
        $stmt->close();

        // Display the admin panel with a welcome message
        echo "Welcome to the Admin Panel!";
    } else {
        // If no matching record is found, redirect back to the login page
        header("Location: unit_07.html");
    }

    $conn->close();
} else {
    // If session variables are not set, redirect back to the login page
    header("Location: unit_07.html");
}
?>
