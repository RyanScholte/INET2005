<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
</head>
<body>
    <h2>Enter Your Grade</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="mark">Grade:</label>
        <input type="text" name="mark" id="mark">
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mark = $_POST["mark"];
        if (empty($mark)) {
            echo "Error: Please enter a grade.";
        } elseif (is_numeric($mark)) {
            if ($mark >= 85 && $mark <= 100) {
                echo "Grade: A";
            } elseif ($mark >= 75 && $mark < 85) {
                echo "Grade: B";
            } elseif ($mark >= 60 && $mark < 75) {
                echo "Grade: C";
            } else {
                echo "Grade: F";
            }
        } else {
            switch (true) {
                case stripos($mark, 'A') !== false:
                    echo "Mark Range: 85-100";
                    break;
                case stripos($mark, 'B') !== false:
                    echo "Mark Range: 75-84";
                    break;
                case stripos($mark, 'C') !== false:
                    echo "Mark Range: 60-74";
                    break;
                default:
                    echo "Mark Range: 0-59";
                    break;
            }
        }
    }
    ?>
</body>
</html>