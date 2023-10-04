<!DOCTYPE html>
<html>
<head>
    <title>Date Calculator</title>
</head>
<body>
    <h1>Date Calculator</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userDate = $_POST['inputDate'];
        $targetDate = '2016-06-30';

        // Calculate the difference in days
        $datetime1 = new DateTime($userDate);
        $datetime2 = new DateTime($targetDate);
        $interval = $datetime1->diff($datetime2);
        $daysDifference = $interval->days;

        echo "The number of days between $userDate and $targetDate is: $daysDifference days.";
    }
    ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="inputDate">Enter a date (YYYY-MM-DD):</label>
        <input type="text" id="inputDate" name="inputDate" required>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>