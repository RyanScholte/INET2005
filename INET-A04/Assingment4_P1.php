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
$result = $db->query("SELECT last_name FROM registered_users");

$last_name_array = array(); // Initialize the last_name_array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $last_name_array[] = $row['last_name'];
    }
    
    // Sort the array alphabetically
    sort($last_name_array);

    echo "<h2>Last Names in Alphabetical Order</h2>";
    echo "<ul>";

    // Display last names using a for loop
    for ($i = 0; $i < count($last_name_array); $i++) {
        echo "<li>" . $last_name_array[$i] . "</li>";
    }
    
    echo "</ul>";
} else {
    echo "No last names found in the database.";
}

// Close the database connection
$db->close();
?>