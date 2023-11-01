<?php
// Server Connection Data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment3";

// Create a database connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch all users from the database
$result = $db->query("SELECT user_id, first_name, last_name FROM registered_users");

$all_users = array(); // Initialize the multidimensional array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_array = array(
            "user_id" => $row['user_id'],
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name']
        );
        $all_users[] = $user_array;
    }
    
    echo "<h2>Users' Information</h2>";

    // Loop through the multidimensional array and display the stored values
    foreach ($all_users as $user) {
        echo "<p>User ID: " . $user["user_id"] . "</p>";
        echo "<p>First Name: " . $user["first_name"] . "</p>";
        echo "<p>Last Name: " . $user["last_name"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No users found in the database.";
}

// Close the database connection
$db->close();
?>