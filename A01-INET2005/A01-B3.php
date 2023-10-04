<!DOCTYPE html>
<html>
<head>
    <title>Math Operations</title>
</head>
<body>
    <h1>Math Operations</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="number1">Enter the first number:</label>
        <input type="number" id="number1" name="number1" required>
        <br>
        <label for="number2">Enter the second number:</label>
        <input type="number" id="number2" name="number2" required>
        <br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = $_POST['number1'];
        $y = $_POST['number2'];

        function addThem($a, $b) {
            return $a + $b;
        }

        function subtractThem($a, $b) {
            return $a - $b;
        }

        function multiplyThem($a, $b) {
            return $a * $b;
        }

        function divideThem($a, $b) {
            if ($b != 0) {
                return $a / $b;
            } else {
                return "Undefined (division by zero)";
            }
        }

        $resultAdd = addThem($x, $y);
        $resultSubtract = subtractThem($x, $y);
        $resultMultiply = multiplyThem($x, $y);
        $resultDivide = divideThem($x, $y);

        echo "$x plus $y is $resultAdd, $x minus $y is $resultSubtract, $x multiplied by $y is $resultMultiply, and $x divided by $y is $resultDivide.";
    }
    ?>
</body>
</html>