<!DOCTYPE html>
<html>
<head>
    <title>Number Operations</title>
</head>
<body>
    <h1>Real Number Operations</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted number
        $inputNumber = $_POST["number"];
        
        // Ensure the input is a valid number
        if (is_numeric($inputNumber)) {
            $roundedNumber = round($inputNumber);
            $ceiledNumber = ceil($inputNumber);
            $flooredNumber = floor($inputNumber);

            echo "<p>Original Number: $inputNumber</p>";
            echo "<p>Rounded Number: $roundedNumber</p>";
            echo "<p>Ceiled Number: $ceiledNumber</p>";
            echo "<p>Floored Number: $flooredNumber</p>";
        } else {
            echo "<p>Invalid input. Please enter a valid number.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="number">Enter a real number:</label>
        <input type="text" name="number" id="number" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>