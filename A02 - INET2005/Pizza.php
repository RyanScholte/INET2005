<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order Form</title>
</head>
<body>
    <h2>Pizza Order Form</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $pizza_size = $_POST["pizza_size"];
        $toppings = isset($_POST["toppings"]) ? $_POST["toppings"] : [];

        // Define the price for each pizza size
        $size_prices = [
            "small" => 9.00,
            "medium" => 12.50,
            "large" => 15.00,
            "extra_large" => 17.50,
        ];

        // Calculate the base cost
        $base_cost = $size_prices[$pizza_size];

        // Calculate the cost of selected toppings
        $topping_cost = count($toppings) - 1; // $1.00 per topping except cheese

        // Calculate the total cost
        $total_cost = $base_cost + $topping_cost;

        // Display the order summary
        echo "Pizza Size: " . ucfirst($pizza_size) . "<br>";
        echo "Toppings: " . (empty($toppings) ? "Cheese" : implode(", ", $toppings)) . "<br>";
        echo "Total Cost: $" . number_format($total_cost, 2);
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="pizza_size">Select Pizza Size:</label>
        <select name="pizza_size" id="pizza_size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
            <option value="extra_large">Extra Large</option>
        </select>

        <br><br>

        <label>Toppings:</label><br>
        <input type="checkbox" name="toppings[]" value="pepperoni"> Pepperoni ($1.00)<br>
        <input type="checkbox" name="toppings[]" value="cheese"> Cheese (Free)<br>
        <input type="checkbox" name="toppings[]" value="olive"> Olive ($1.00)<br>
        <input type="checkbox" name="toppings[]" value="pineapple"> Pineapple ($1.00)<br>
        <input type="checkbox" name="toppings[]" value="ham"> Ham ($1.00)

        <br><br>

        <input type="submit" value="Calculate Total Cost">
    </form>
</body>
</html>